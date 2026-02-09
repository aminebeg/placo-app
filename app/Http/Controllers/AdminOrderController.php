<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\ActivityLog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    /**
     * Show the form for creating a new order.
     */
    public function create()
    {
        $products = Product::orderBy('name_fr')->get();
        $users = User::orderBy('last_name')->select('id', 'first_name', 'last_name', 'email', 'phone', 'company')->get();
        return view('admin.orders.create', compact('products', 'users'));
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // User Information
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            
            // Order Details
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'custom_price' => 'nullable|numeric|min:0', // Optional override if needed later
            
            'delivery_address' => 'nullable|string',
            'notes' => 'nullable|string',
            'requested_delivery_date' => 'nullable|date|after_or_equal:today',
            'status' => 'required|in:pending,confirmed,in_delivery,delivered,cancelled'
        ]);

        return DB::transaction(function () use ($validated) {
            // 1. Find or Create User
            $user = null;
            
            // Try to find by email if provided
            if (!empty($validated['email'])) {
                $user = User::where('email', $validated['email'])->first();
            }
            
            // If not found (or no email), try to find by phone
            if (!$user && !empty($validated['phone'])) {
                $user = User::where('phone', $validated['phone'])->first();
            }

            $isNewUser = false;
            $randomPassword = null;

            if (!$user) {
                $isNewUser = true;
                $randomPassword = Str::random(10);
                
                // Generate a placeholder email if none provided
                $email = $validated['email'];
                if (empty($email)) {
                    $sanitizedPhone = preg_replace('/[^0-9]/', '', $validated['phone']);
                    $email = $sanitizedPhone . '@no-email.app';
                    
                    // Ensure uniqueness
                    $count = 0;
                    while(User::where('email', $email)->exists()) {
                         $count++;
                         $email = $sanitizedPhone . '_' . $count . '@no-email.app';
                    }
                }
                
                $user = User::create([
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'email' => $email,
                    'phone' => $validated['phone'],
                    'company' => $validated['company'],
                    'password' => Hash::make($randomPassword),
                    'role' => 'client',
                    'email_verified_at' => now(), // Auto-verify for admin created users
                ]);
                
            } else {
                // Update existing info if provided
                if (empty($user->phone)) $user->phone = $validated['phone'];
                if (empty($user->company)) $user->company = $validated['company'];
                // Only update email if provided and different
                if (!empty($validated['email']) && $user->email !== $validated['email']) {
                    $user->email = $validated['email'];
                }
                $user->save();
            }

            // 2. Calculate Total
            $subtotal = 0;
            $itemsData = [];

            foreach ($validated['items'] as $item) {
                $product = Product::find($item['product_id']);
                $lineTotal = $product->price * $item['quantity'];
                $subtotal += $lineTotal;
                
                $itemsData[] = [
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price
                ];
            }

            // 3. Create Order
            $order = Order::create([
                'user_id' => $user->id,
                'status' => $validated['status'],
                'order_number' => strtoupper(uniqid('BON-')), // Or use custom logic
                'subtotal' => $subtotal,
                'tax' => 0, // Implement tax logic if needed
                'shipping' => 0, // Implement shipping logic if needed
                'total' => $subtotal,
                'delivery_address' => $validated['delivery_address'] ?? null,
                'notes' => $validated['notes'] ?? null,
                'requested_delivery_date' => $validated['requested_delivery_date'] ?? null,
                'logistics_type' => 'standard'
            ]);

            // 4. Create Order Items
            foreach ($itemsData as $data) {
                $order->items()->create($data);
            }

            // 5. Log Activity
            ActivityLog::logAction(
                'admin_order_create',
                __('Commande #:number créée manuellement pour :user par l\'admin', [
                    'number' => $order->order_number,
                    'user' => $user->first_name . ' ' . $user->last_name
                ]),
                $order
            );

            if ($isNewUser) {
                $message = __('Commande créée avec succès ! Nouvel utilisateur créé.');
                if (!str_contains($user->email, '@no-email.app')) {
                   $message .= ' ' . __('Mot de passe temporaire : :password', ['password' => $randomPassword]);
                }
                
                return redirect()->route('admin.dashboard', ['tab' => 'orders'])
                    ->with('success', $message);
            }

            return redirect()->route('admin.dashboard', ['tab' => 'orders'])
                ->with('success', __('Commande créée avec succès pour l\'utilisateur existant.'));
        });
    }

    public function edit(Order $order)
    {
        $order->load(['items', 'user']);
        $products = Product::orderBy('name_fr')->get();
        $users = User::orderBy('last_name')->select('id', 'first_name', 'last_name', 'email', 'phone', 'company')->get();
        return view('admin.orders.edit', compact('order', 'products', 'users'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            // User Information (We update the user associated with the order)
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            
            // Order Details
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            
            'delivery_address' => 'nullable|string',
            'notes' => 'nullable|string',
            'requested_delivery_date' => 'nullable|date',
            'status' => 'required|in:pending,confirmed,in_delivery,delivered,cancelled'
        ]);

        return DB::transaction(function () use ($validated, $order) {
            // 1. Update User Info
            $user = $order->user;
            if ($user) {
                $userData = [
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'phone' => $validated['phone'],
                    'company' => $validated['company'],
                ];
                
                // Only update email if provided
                if (!empty($validated['email'])) {
                    $userData['email'] = $validated['email'];
                }
                
                $user->update($userData);
            }

            // 2. Calculate New Total & Prepare Items
            $subtotal = 0;
            $itemsData = [];

            foreach ($validated['items'] as $item) {
                $product = Product::find($item['product_id']);
                $lineTotal = $product->price * $item['quantity'];
                $subtotal += $lineTotal;
                
                $itemsData[] = [
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price
                ];
            }

            // 3. Update Order
            $order->update([
                'status' => $validated['status'],
                'subtotal' => $subtotal,
                'total' => $subtotal, // Assuming tax/shipping logic is still simple
                'delivery_address' => $validated['delivery_address'] ?? null,
                'notes' => $validated['notes'] ?? null,
                'requested_delivery_date' => $validated['requested_delivery_date'] ?? null,
                'logistics_type' => 'standard'
            ]);

            // 4. Sync Items (Clear and Re-add)
            $order->items()->delete();
            foreach ($itemsData as $data) {
                $order->items()->create($data);
            }

            // 5. Log Activity
            ActivityLog::logAction(
                'admin_order_update_content',
                __('Commande #:number modifiée par l\'admin (Contenu/Détails mis à jour)', [
                    'number' => $order->order_number
                ]),
                $order
            );

            return redirect()->route('admin.dashboard', ['tab' => 'orders'])
                ->with('success', __('Commande mise à jour avec succès.'));
        });
    }
}

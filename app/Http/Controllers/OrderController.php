<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
// PDF rendering will be done via the DOMPDF wrapper via the service container

class OrderController extends Controller
{
    // Print a printable version of an order (bon de commande) for on-screen and PDF
    public function print(Order $order)
    {
        $order->loadMissing(['user', 'items.product']);

        // Ensure user owns the order or is admin/agent
        $user = auth()->user();
        if($user->role !== 'admin' && $user->role !== 'agent' && $order->user_id !== $user->id) {
            abort(403);
        }
        
        return view('orders.print', compact('order'));
    }

    public function printPdf(Order $order)
    {
        $order->loadMissing(['user', 'items.product']);

        // Ensure user owns the order or is admin/agent
        $user = auth()->user();
        if($user->role !== 'admin' && $user->role !== 'agent' && $order->user_id !== $user->id) {
            abort(403);
        }
        
        // Generate a PDF from a dedicated blade
        $pdf = app('dompdf.wrapper')->loadView('orders.print_pdf', compact('order'));
        return $pdf->download('BON-ORDER-' . $order->order_number . '.pdf');
    }
    
    /**
     * Get the count of items in the current commande list.
     */
    public static function getCommandeCount()
    {
        return count(session()->get('commande', []));
    }

    /**
     * Display the current commande list (the "cart").
     */
    public function cart()
    {
        $commande = session()->get('commande', []);
        return view('commande.index', compact('commande'));
    }

    /**
     * Add item to the commande list.
     */
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $commande = session()->get('commande', []);
        $quantity = (int) $request->input('quantity', 1);

        if(isset($commande[$id])) {
            $commande[$id]['quantity'] += $quantity;
            $commande[$id]['name'] = $product->name;
        } else {
            $commande[$id] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "weight" => $product->weight_kg,
                "image" => $product->image_url
            ];
        }

        session()->put('commande', $commande);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => __('Produit ajouté à votre commande !'),
                'commande_count' => count($commande)
            ]);
        }

        return redirect()->back()->with('success', __('Produit ajouté à votre commande !'));
    }

    /**
     * Update item quantity in the commande list.
     */
    public function updateCart(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:9999'
        ]);

        $commande = session()->get('commande', []);
        
        if(isset($commande[$id])) {
            $commande[$id]['quantity'] = $request->quantity;
            session()->put('commande', $commande);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => __('Quantité mise à jour.'),
                    'commande' => $commande
                ]);
            }
            
            return redirect()->back()->with('success', __('Quantité mise à jour.'));
        }
        
        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => __('Article non trouvé.')], 404);
        }
        
        return redirect()->back()->with('error', __('Article non trouvé dans votre liste.'));
    }

    /**
     * Remove item from the commande list.
     */
    public function removeFromCart(Request $request, $id)
    {
        $commande = session()->get('commande');
        if(isset($commande[$id])) {
            unset($commande[$id]);
            session()->put('commande', $commande);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => __('Article retiré.'),
                    'commande' => $commande
                ]);
            }
            
            return redirect()->back()->with('success', __('Article retiré.'));
        }
        
        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => __('Article non trouvé.')], 404);
        }
        
        return redirect()->back()->with('error', __('Article non trouvé.'));
    }

    /**
     * Finalize the commande and create a Purchase Order.
     */
    public function finalize(Request $request)
    {
        $commande = session()->get('commande');
        if(!$commande || empty($commande)) {
            return redirect()->back()->with('error', __('Votre liste d\'approvisionnement est vide.'));
        }

        $validated = $request->validate([
            'delivery_address' => 'nullable|string',
            'notes' => 'nullable|string',
            'requested_delivery_date' => 'nullable|date|after_or_equal:+3 days',
            'logistics_type' => 'nullable|string|in:standard,bundle,pallet,bulk'
        ], [
            'requested_delivery_date.after_or_equal' => __('La date de livraison doit être au moins 3 jours après aujourd\'hui pour garantir une meilleure préparation de votre commande.'),
        ]);

        DB::transaction(function () use ($commande, $validated) {
            $total = collect($commande)->sum(fn($i) => $i['price'] * $i['quantity']);
            
            $order = Order::create([
                'user_id' => auth()->id(),
                'status' => 'pending',
                'order_number' => strtoupper(uniqid('BON-')),
                'subtotal' => $total,
                'tax' => 0,
                'shipping' => 0,
                'total' => $total,
                'delivery_address' => $validated['delivery_address'] ?? null,
                'notes' => $validated['notes'] ?? null,
                'requested_delivery_date' => $validated['requested_delivery_date'] ?? null,
                'logistics_type' => $validated['logistics_type'] ?? 'standard'
            ]);

            foreach($commande as $id => $details) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price']
                ]);
            }

            session()->forget('commande');
        });

        return redirect()->route('orders.index')->with('success', __('Commande transmise avec succès. La date de livraison peut varier selon les facteurs logistiques et la disponibilité des produits.'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'admin' || auth()->user()->role === 'agent') {
            // Agents and admins see all orders
            $orders = \App\Models\Order::withCount('items')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        } else {
            // Clients see only their own orders
            $orders = \App\Models\Order::where('user_id', auth()->id())
                        ->withCount('items')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        }
                    
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = \App\Models\Order::with(['items.product', 'user'])->findOrFail($id);
        
        // Ensure user owns the order or is admin/agent
        $user = auth()->user();
        if($user->role !== 'admin' && $user->role !== 'agent' && $order->user_id !== $user->id) {
            abort(403);
        }

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = \App\Models\Order::findOrFail($id);
        
        // Only admin or agent can update order status
        $user = auth()->user();
        if($user->role !== 'admin' && $user->role !== 'agent') {
            abort(403);
        }

        $validated = $request->validate([
            'status' => 'required|string|in:pending,confirmed,processing,shipped,delivered,cancelled'
        ]);

        $order->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', __('Statut de la commande mis à jour.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

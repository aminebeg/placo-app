<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class RequisitionController extends Controller
{
    /**
     * Get the count of items in the current requisition list.
     */
    public static function getRequisitionCount()
    {
        return count(session()->get('requisition', []));
    }

    /**
     * Display the current requisition list (the "cart").
     */
    public function index()
    {
        $requisition = session()->get('requisition', []);
        return view('requisition.index', compact('requisition'));
    }

    /**
     * Add item to the requisition list.
     */
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $requisition = session()->get('requisition', []);
        $quantity = (int) $request->input('quantity', 1);

        if(isset($requisition[$id])) {
            $requisition[$id]['quantity'] += $quantity;
            $requisition[$id]['name'] = $product->name;
        } else {
            $requisition[$id] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "weight" => $product->weight_kg,
                "image" => $product->image_url
            ];
        }

        session()->put('requisition', $requisition);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => __('Produit ajouté à votre bon de commande !'),
                'requisition_count' => count($requisition)
            ]);
        }

        return redirect()->back()->with('success', __('Produit ajouté à votre bon de commande !'));
    }

    /**
     * Update item quantity in the requisition list.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:9999'
        ]);

        $requisition = session()->get('requisition', []);
        
        if(isset($requisition[$id])) {
            $requisition[$id]['quantity'] = $request->quantity;
            session()->put('requisition', $requisition);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => __('Quantité mise à jour.'),
                    'requisition' => $requisition
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
     * Remove item from the requisition list.
     */
    public function remove(Request $request, $id)
    {
        $requisition = session()->get('requisition');
        if(isset($requisition[$id])) {
            unset($requisition[$id]);
            session()->put('requisition', $requisition);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => __('Article retiré.'),
                    'requisition' => $requisition
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
     * Finalize the requisition and create a Purchase Order.
     */
    public function store(Request $request)
    {
        $requisition = session()->get('requisition');
        if(!$requisition || empty($requisition)) {
            return redirect()->back()->with('error', __('Votre liste d\'approvisionnement est vide.'));
        }

        $validated = $request->validate([
            'delivery_address' => 'nullable|string',
            'notes' => 'nullable|string',
            'requested_delivery_date' => 'nullable|date|after:today',
            'logistics_type' => 'nullable|string|in:standard,bundle,pallet,bulk'
        ]);

        DB::transaction(function () use ($requisition, $validated) {
            $total = collect($requisition)->sum(fn($i) => $i['price'] * $i['quantity']);
            
            $order = Order::create([
                'user_id' => auth()->id(),
                'status' => 'pending',
                'order_number' => strtoupper(uniqid('BON-')),
                'subtotal' => $total,
                'tax' => 0,
                'shipping' => 0,
                'total' => $total,
                'project_reference' => null,
                'delivery_address' => $validated['delivery_address'] ?? null,
                'notes' => $validated['notes'] ?? null,
                'requested_delivery_date' => $validated['requested_delivery_date'] ?? null,
                'logistics_type' => $validated['logistics_type'] ?? 'standard'
            ]);

            foreach($requisition as $id => $details) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price']
                ]);
            }

            session()->forget('requisition');
        });

        return redirect()->route('orders.index')->with('success', __('Bon de commande transmis avec succès.'));
    }
}

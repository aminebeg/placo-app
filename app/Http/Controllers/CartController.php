<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Display the cart
    public static function getCartCount()
    {
        return count(session()->get('cart', []));
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Add item to cart
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        $quantity = (int) $request->input('quantity', 1);

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
            $cart[$id]['name'] = $product->name; // Update name in case locale changed
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "weight" => $product->weight_kg,
                "image" => $product->image_url
            ];
        }

        session()->put('cart', $cart);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => __('Product added to requisition list!'),
                'cart_count' => count($cart)
            ]);
        }

        return redirect()->back()->with('success', __('Product added to requisition list!'));
    }

    // Update item quantity
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:9999'
        ]);

        $cart = session()->get('cart', []);
        
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => __('Quantity updated.'),
                    'cart' => $cart
                ]);
            }
            
            return redirect()->back()->with('success', __('Quantity updated.'));
        }
        
        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => __('Item not found.')], 404);
        }
        
        return redirect()->back()->with('error', __('Item not found in cart.'));
    }

    // Remove item from cart
    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => __('Item removed.'),
                    'cart' => $cart
                ]);
            }
            
            return redirect()->back()->with('success', __('Item removed.'));
        }
        
        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => __('Item not found.')], 404);
        }
        
        return redirect()->back()->with('error', __('Item not found.'));
    }

    // Checkout / Create Order
    public function checkout(Request $request)
    {
        $cart = session()->get('cart');
        if(!$cart || empty($cart)) {
            return redirect()->back()->with('error', __('Your requisition list is empty.'));
        }

        $validated = $request->validate([
            'project_reference' => 'nullable|string|max:255',
            'delivery_address' => 'required|string',
            'notes' => 'nullable|string',
            'requested_delivery_date' => 'nullable|date|after:today',
            'logistics_type' => 'required|string|in:standard,bundle,pallet,bulk'
        ]);

        DB::transaction(function () use ($cart, $validated) {
            $subtotal = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);
            $tax = $subtotal * 0.19;
            $shipping = 0; // Placeholder
            
            $order = Order::create([
                'user_id' => auth()->id(),
                'status' => 'pending',
                'order_number' => strtoupper(uniqid('PO-')),
                'subtotal' => $subtotal,
                'tax' => $tax,
                'shipping' => $shipping,
                'total' => $subtotal + $tax + $shipping,
                'project_reference' => $validated['project_reference'],
                'delivery_address' => $validated['delivery_address'],
                'notes' => $validated['notes'],
                'requested_delivery_date' => $validated['requested_delivery_date'],
                'logistics_type' => $validated['logistics_type']
            ]);

            foreach($cart as $id => $details) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price']
                ]);
            }

            session()->forget('cart');
        });

        return redirect()->route('orders.index')->with('success', __('Purchase Order transmitted successfully.'));
    }
}

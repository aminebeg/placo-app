<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q', '');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }
        
        $results = [];
        $user = auth()->user();
        
        // Search Orders (admins/agents see all, clients see their own)
        $ordersQuery = Order::with('user')
            ->where('order_number', 'like', '%' . $query . '%');
        
        if ($user->role === 'client') {
            $ordersQuery->where('user_id', $user->id);
        }
        
        $orders = $ordersQuery->limit(5)->get();
        
        foreach ($orders as $order) {
            $results[] = [
                'id' => $order->id,
                'type' => 'order',
                'title' => '#' . $order->order_number,
                'subtitle' => $order->user->first_name . ' ' . $order->user->last_name . ' - ' . $order->total . ' DA',
                'url' => '/orders/' . $order->id,
            ];
        }
        
        // Search Products (all roles can see products)
        $products = Product::where('name_fr', 'like', '%' . $query . '%')
            ->orWhere('name_en', 'like', '%' . $query . '%')
            ->limit(5)
            ->get();
        
        foreach ($products as $product) {
            $results[] = [
                'id' => $product->id,
                'type' => 'product',
                'title' => $product->name_fr ?? $product->name_en,
                'subtitle' => $product->price . ' DA',
                'url' => '/products/' . $product->id,
            ];
        }
        
        // Search Users (admin/agent only)
        if ($user->role === 'admin' || $user->role === 'agent') {
            $users = User::where('first_name', 'like', '%' . $query . '%')
                ->orWhere('last_name', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%')
                ->orWhere('company', 'like', '%' . $query . '%')
                ->limit(5)
                ->get();
            
            foreach ($users as $userResult) {
                $results[] = [
                    'id' => $userResult->id,
                    'type' => 'user',
                    'title' => $userResult->first_name . ' ' . $userResult->last_name,
                    'subtitle' => $userResult->company ?? $userResult->email,
                    'url' => '/admin/dashboard?tab=users&search=' . urlencode($query),
                ];
            }
        }
        
        return response()->json(array_slice($results, 0, 10));
    }
}

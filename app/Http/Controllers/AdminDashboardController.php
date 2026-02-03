<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Fetch all data needed for the dashboard overview
        $recentOrders = Order::with('user')->orderBy('created_at', 'desc')->take(5)->get();
        $allOrders = Order::with('user')->orderBy('created_at', 'desc')->get();
        $products = Product::with('category')->get();
        $users = User::all();
        
        $stats = [
            'revenue' => Order::sum('total'),
            'active_orders' => Order::whereIn('status', ['pending', 'processing'])->count(),
            'total_users' => User::count(),
            'low_stock' => Product::where('in_stock', false)->count(),
        ];

        return view('admin.dashboard', [
            'recent_orders' => $recentOrders,
            'all_orders' => $allOrders,
            'stat_products' => $products,
            'users' => $users,
            'stats' => $stats
        ]);
    }
    public function updateOrderStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,delivered,cancelled'
        ]);

        $order->update(['status' => $validated['status']]);

        return back()->with('success', __('Order status updated successfully.'));
    }

    public function updateUserRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:admin,client'
        ]);

        $user->update(['role' => $validated['role']]);

        return back()->with('success', __('User role updated successfully.'));
    }

    public function destroyUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', __('You cannot delete yourself.'));
        }
        
        $user->delete();
        return back()->with('success', __('User access revoked (account deleted).'));
    }
}

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
        // Fetch all data needed for the dashboard overview with eager loading to prevent N+1 queries
        $recentOrders = Order::with(['user', 'items'])->orderBy('created_at', 'desc')->take(5)->get();
        $allOrders = Order::with(['user', 'items'])->orderBy('created_at', 'desc')->get();
        $products = Product::with('category')->get();
        $users = User::all();
        
        // Stats for Dashboard Overview
        $now = now();
        $startOfWeek = $now->copy()->startOfWeek();
        $startOfLastWeek = $now->copy()->subWeek()->startOfWeek();
        $endOfLastWeek = $now->copy()->subWeek()->endOfWeek();

        $currentWeekRevenue = Order::where('created_at', '>=', $startOfWeek)->sum('total');
        $lastWeekRevenue = Order::whereBetween('created_at', [$startOfLastWeek, $endOfLastWeek])->sum('total');
        
        $revenueChange = $lastWeekRevenue > 0 
            ? (($currentWeekRevenue - $lastWeekRevenue) / $lastWeekRevenue) * 100 
            : ($currentWeekRevenue > 0 ? 100 : 0);

        $stats = [
            'revenue' => Order::sum('total'),
            'revenue_change' => number_format($revenueChange, 1),
            'active_orders' => Order::whereIn('status', ['pending', 'processing'])->count(),
            'total_users' => User::count(),
            'low_stock' => Product::where('in_stock', false)->count(),
        ];

        $activityLogs = \App\Models\ActivityLog::with('user')->orderBy('created_at', 'desc')->take(15)->get();

        return view('admin.dashboard', [
            'recent_orders' => $recentOrders,
            'all_orders' => $allOrders,
            'stat_products' => $products,
            'users' => $users,
            'stats' => $stats,
            'activity_logs' => $activityLogs
        ]);
    }

    public function clearActivityLogs()
    {
        \App\Models\ActivityLog::truncate();
        
        \App\Models\ActivityLog::logAction(
            'logs_cleared', 
            __('Nettoyage complet de l\'historique d\'activité effectué par :name', [
                'name' => auth()->user()->first_name . ' ' . auth()->user()->last_name
            ])
        );

        return back()->with('success', __('Audit trail has been purged successfully.'));
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,delivered,cancelled'
        ]);

        $oldStatus = $order->status;
        $order->update(['status' => $validated['status']]);

        \App\Models\ActivityLog::logAction(
            'order_update', 
            __('Mise à jour du statut de la commande #:number de :old à :new', [
                'number' => $order->order_number,
                'old' => $oldStatus,
                'new' => $validated['status']
            ]),
            $order
        );

        return back()->with('success', __('Order status updated successfully.'));
    }

    public function updateUserRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:admin,agent,client'
        ]);

        $oldRole = $user->role;
        $user->update(['role' => $validated['role']]);

        \App\Models\ActivityLog::logAction(
            'user_role_update', 
            __('Mise à jour du rôle de :name de :old à :new', [
                'name' => $user->first_name . ' ' . $user->last_name,
                'old' => $oldRole,
                'new' => $validated['role']
            ]),
            $user
        );

        return back()->with('success', __('User role updated successfully.'));
    }

    public function destroyUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', __('You cannot delete yourself.'));
        }
        
        $userName = $user->first_name . ' ' . $user->last_name;
        $user->delete();

        \App\Models\ActivityLog::logAction(
            'user_deletion', 
            __('Suppression du compte de :name', ['name' => $userName])
        );

        return back()->with('success', __('User access revoked (account deleted).'));
    }

    public function exportOrders(Request $request)
    {
        $query = Order::with(['user', 'items.product']);
        
        // Apply filters if provided
        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }
        
        if ($request->date_from) {
            $query->where('created_at', '>=', $request->date_from);
        }
        
        if ($request->date_to) {
            $query->where('created_at', '<=', $request->date_to);
        }
        
        $orders = $query->orderBy('created_at', 'desc')->get();
        
        // Generate CSV
        $csv = "Order Number,Customer Name,Company,Email,Status,Items Count,Subtotal,Tax,Shipping,Total,Delivery Address,Requested Delivery Date,Logistics Type,Order Date\n";
        
        foreach ($orders as $order) {
            $csv .= sprintf(
                "%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s\n",
                $order->order_number,
                $order->user->first_name . ' ' . $order->user->last_name,
                $order->user->company ?? 'N/A',
                $order->user->email,
                $order->status,
                $order->items->count(),
                number_format($order->subtotal, 2, '.', ''),
                number_format($order->tax, 2, '.', ''),
                number_format($order->shipping, 2, '.', ''),
                number_format($order->total, 2, '.', ''),
                str_replace(',', ';', $order->delivery_address ?? 'N/A'),
                $order->requested_delivery_date ?? 'N/A',
                $order->logistics_type ?? 'N/A',
                $order->created_at->format('Y-m-d H:i:s')
            );
        }

        $filename = 'orders-export-' . now()->format('Y-m-d-His') . '.csv';
        
        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    public function bulkUpdateOrderStatus(Request $request)
    {
        $validated = $request->validate([
            'order_ids' => 'required|array',
            'order_ids.*' => 'exists:orders,id',
            'status' => 'required|in:pending,processing,delivered,cancelled'
        ]);

        Order::whereIn('id', $validated['order_ids'])->update(['status' => $validated['status']]);

        \App\Models\ActivityLog::logAction(
            'bulk_order_update', 
            __('Mise à jour groupée de :count commandes vers le statut :status', [
                'count' => count($validated['order_ids']),
                'status' => $validated['status']
            ]),
            null,
            ['order_ids' => $validated['order_ids']]
        );

        return back()->with('success', __('Successfully updated :count orders.', ['count' => count($validated['order_ids'])]));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderComment;

class OrderCommentController extends Controller
{
    public function store(Request $request, Order $order)
    {
        // Security check: only the order owner or an admin can comment
        if (auth()->user()->role !== 'admin' && $order->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'comment' => 'required|string',
            'is_internal' => 'boolean'
        ]);

        $comment = $order->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $validated['comment'],
            'is_internal' => $request->has('is_internal') && auth()->user()->role === 'admin' ? $validated['is_internal'] : false
        ]);

        // Log this activity
        \App\Models\ActivityLog::logAction(
            'order_comment', 
            __(':user a ajouté un commentaire sur la commande #:number', [
                'user' => auth()->user()->first_name,
                'number' => $order->order_number
            ]),
            $order
        );

        return back()->with('success', __('Commentaire ajouté.'));
    }
}

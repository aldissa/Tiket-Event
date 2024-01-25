<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailOrder;
use App\Models\Event;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // app/Http/Controllers/AdminController.php

    public function events()
    {
        $events = Event::all();
        return view('admin', compact('events'));
    }

    public function updateEventStatus(Event $event, Request $request)
    {
        $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        $event->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin');
    }

    public function pendingOrders()
    {
        $pendingOrders = Order::with('detailOrders')->whereHas('detailOrders', function ($query) {
            $query->where('status_pembayaran', 'pending');
        })->get();

        return view('orders', compact('pendingOrders'));
    }

    public function completedRejectedOrders()
    {
        $completedRejectedOrders = Order::with('detailOrders')->whereHas('detailOrders', function ($query) {
            $query->whereIn('status_pembayaran', ['completed', 'rejected']);
        })->get();

        return view('riwayat', compact('completedRejectedOrders'));
    }

    public function updateOrderStatus(DetailOrder $detailOrder, Request $request)
    {
        $request->validate([
            'status_pembayaran' => 'required|in:pending,completed,rejected',
        ]);

        $detailOrder->update([
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return redirect()->route('orders');
    }
}

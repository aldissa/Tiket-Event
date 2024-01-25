<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailOrder;
use App\Models\Event;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    function home()
    {
        $e = Event::where('status', 'active')->get();

        return view('welcome', compact('e'));
    }

    function detail(Event $event)
    {
        return view('detail', compact('event'));
    }

    public function postkeranjang(Request $request, Event $event)
    {
        $request->validate([
            'banyak' => 'required',
        ]);

        if ($request->banyak > $event->stock) {
            return redirect()->back()->with('error', 'Maaf, stok tiket tidak mencukupi.');
        }

        DetailOrder::create([
            'qty' => $request->banyak,
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'status_pembayaran' => 'pending',
            'pricetotal' => $event->price * $request->banyak
        ]);

        return redirect()->route('keranjang');
    }

    function keranjang(Request $request)
    {
        $detailorder = DetailOrder::with('event')->get();

        return view('keranjang', compact('detailorder'));
    }

    function bayar(Request $request, DetailOrder $detailorder)
    {
        $event = $detailorder->event;

        return view('bayar', compact('event', 'detailorder'));
    }

    function postbayar(Request $request, DetailOrder $detailorder)
    {
        $request->validate([
            'bukti_pembayaran' => 'required'
        ]);

        $order = Order::create([
            'user_id' => auth()->id(),
            'pricetotal' => $detailorder->pricetotal,
            'code' => 'INV' . Str::random(8)
        ]);

        $detailorder->update([
            'order_id' => $order->id,
            'bukti_pembayaran' => $request->bukti_pembayaran->store('img')
        ]);

        $event = $detailorder->event;
        $event->stock -= $detailorder->qty;
        $event->save();

        return redirect()->route('keranjang');
    }
}

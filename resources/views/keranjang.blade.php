@extends('Template.html')

@section('title', 'Keranjang')

@section('body')
@include('template.nav')
    <div class="container mt-5">
        <h2>Transaksi</h2>

        @foreach ($detailorder as $do)
            <div class="card mt-3">
                <div class="row">
                    <div class="card-header">
                        <h3>Detail Pesanan</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset($do->event->image) }}" alt="Event Image" class="img-fluid">
                            </div>
                            <div class="col-md-9">
                                <p><b>Event:</b> {{ $do->event->name }}</p>
                                <p><b>Tanggal:</b> {{ $do->event->date }}</p>
                                <p><b>Waktu:</b> {{ $do->event->time }}</p>
                                <p><b>Tempat</b>: {{ $do->event->venue }}</p>
                                <p><b>Jumlah Tiket:</b> {{ $do->qty }}</p>
                                <p><b>Total Harga: </b>Rp.{{ number_format($do->pricetotal, 0, '.', '.') }}</p>
                                <p><b>Status Pembayaran:</b> {{ $do->status_pembayaran }}</p>
                                @if ($do->status_pembayaran == 'completed')
                                    <p>Anda sudah membayar. Code Order: {{ $do->order->code }}</p>
                                @elseif ($do->status_pembayaran == 'rejected')
                                    <p>Maaf, pembayaran Anda ditolak.</p>
                                @else
                                    <a href="{{ route('bayar', $do->id) }}" class="btn btn-primary">Bayar</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

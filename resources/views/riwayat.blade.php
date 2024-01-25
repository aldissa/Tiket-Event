<!-- resources/views/admin/completed-rejected-orders.blade.php -->
@extends('Template.html')

@section('title', 'Admin Completed/Rejected Orders')

@section('body')
@include('template.navadmin')

    <div class="container mt-5">
        <h2>Completed/Rejected Orders</h2>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Order Code</th>
                    <th>Event Name</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($completedRejectedOrders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->code }}</td>
                        <td>
                            @foreach ($order->detailOrders as $detailOrder)
                                {{ $detailOrder->event->name }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($order->detailOrders as $detailOrder)
                                {{ $detailOrder->status_pembayaran }}
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@extends('Template.html')

@section('title', 'Admin Pending Orders')

@section('body')
@include('template.navadmin')
<div class="container mt-5">
    <h2>Pending Orders</h2>

    <div class="row mt-3">
        @foreach ($pendingOrders as $order)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Order Code: {{ $order->code }}</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($order->detailOrders as $detailOrder)
                                <li class="list-group-item">
                                    <span>Event Name: {{ $detailOrder->event->name }}</span> <br>
                                    <span class="float-right">Status Pembayaran: {{ $detailOrder->status_pembayaran }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('orders.update-status', $order->id) }}" method="POST">
                            @csrf
                            <label for="status_pembayaran" class="sr-only">Update Status Pembayaran:</label>
                            <select name="status_pembayaran" id="status_pembayaran" class="form-control mb-2">
                                <option value="pending" selected>Pending</option>
                                <option value="completed">Completed</option>
                                <option value="rejected">Rejected</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection

@extends('template.html')
@section('title','Home')
@section('body')
@include('template.nav')
<div class="container">
    <div class="row">
        @foreach ($e as $event)
            <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                <div class="card d-flex flex-grow-1">
                    <img src="{{ $event->image }}" alt="{{ $event->name }}" class="card-img-top" width="150"
                        height="200">
                    <h5 class="card-title">{{ Str::limit($event->name, 20) }}</h5>
                    <p class="card-text">Stok: {{ $event->stock }}</p>
                    <p class="card-text">Status: {{ $event->status }}</p>
                    <b class="card-text">Harga: Rp.{{ number_format($event->price, 0, ',', '.') }}</b>
                    <a href="{{ route('detail', $event->id) }}" class="btn btn-primary mt-2">Detail</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
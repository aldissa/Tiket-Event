@extends('Template.html')

@section('title', 'Detail Game')

@section('body')

    @include('template.nav')
    <div class="container mt-5">
        <form action="{{ route('postkeranjang', $event->id) }}" method="POST">
            @csrf

            <h2>Event</h2>
            <div class="container mt-5 mx-auto">
                <img src="{{ asset($event->image) }}" alt="" width="100%">
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="card-body">
                                <h3>Deskripsi</h3>
                                <p>{{ $event->description }}</p>
                                <h2 class="mt-5">PETA</h2>
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.341309521874!2d106.79919777504612!3d-6.218643460907863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14d30079f01%3A0x2e74f2341fff266d!2sStadion%20Utama%20Gelora%20Bung%20Karno!5e0!3m2!1sid!2sid!4v1705907508635!5m2!1sid!2sid"
                                    width="500" height="340" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="ticket-body">
                                    <div class="event-details">
                                        <h3>{{ $event->name }}</h3>
                                        <p><b>Date:</b> {{ $event->date }}</p>
                                        <p><b>Time</b>: {{ $event->time }} PM</p>
                                        <p><b>Venue:</b> {{ $event->venue }}</p>
                                        <p><b>Stock:</b> {{ $event->stock }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="event-details">
                                    <h3>Pilih ticket</h3>
                                    <P class="mt-5">Tiket vestival seat</P>
                                    <b class="card-text">Harga : Rp. {{ $event->price }}</b>
                                    <input type="number" name="banyak" class="form-control" required value="1"
                                        min="1">
                                    <hr>
                                    <h5>Total pesanan:</h5>
                                    <button class="btn btn-primary">Pesan sekarang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

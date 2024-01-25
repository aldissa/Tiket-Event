<nav class="navbar navbar-expand-lg" style="background-color: rgb(49, 134, 209)">
    <div class="container">
        <a href="/" class="navbar-brand text-light">Home</a>
        <div class="navbar nav-item gap-1">
            @guest

            <a href="{{ route('loginform') }}" class="btn btn-success">login</a>
            @else
            <a href="{{ route('keranjang') }}" class="nav-link text-light">Transaksi</a> 
            <a href="{{ route('logout') }}" class="btn btn-success">logout</a> 

            @endguest
        </div>
    </div>
</nav>

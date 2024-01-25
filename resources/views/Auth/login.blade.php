@extends('Template.html')

@section('title', 'Login')

@section('body')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-light" >
                    <div class="card-body">
                        <h3 class="card-title text-center text-dark">Login</h3>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" required style="height: 50px" placeholder="Email Address">
                            </div>
                            
                            <div class="form-group mt-3">
                                <input name="password" type="password" class="form-control" required style="height: 50px" placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3" style="width: 100%; height: 50px">Login</button>
                        </form>
                        <div class="text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
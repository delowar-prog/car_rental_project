@extends('auth.layout.authLayout')
@section('title')
    Login
@endsection
@section('content')
    <div class="col-md-4">
       <div class="d-flex justify-content-center align-items-center mb-2">
        <img src="{{asset('assets/images/logo.png')}}" width="250" alt="logo">
       </div>
        <div class="card">
            <div class="card-header">
                <h5 class="text-center">Login Now</h5>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Enter Password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn form-control text-white" style="background-color: #26353e">Login</button>
                    </div>
                    <p>Already have an account <span class="text-primary"><a href="/register">Register</a></span></p>
                </div>
            </form>
        </div>
    </div>
@endsection

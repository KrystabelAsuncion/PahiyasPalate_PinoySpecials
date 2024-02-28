@extends('Auth.layout')

@section('content')

<div class="container main d-flex justify-container-center align-items-center min-vh-100">
    <div class="row mx-auto img-area">
        <div class="col-md-6 col-lg-8 col-xl-12 d-block p-3 mx-auto justify-content-center">
            <img src="{{asset('img/logo_ic/logo 1.png')}}" class="img-fluid">
            <p class="display-4 fw-bold text-center text-uppercase text-welcome">Welcome to pinoy specials!</h1>
        </div>
    </div>
    <div class="row border rounded-5 px-5 mx-auto shadow text-center bg-white">
        <div class="col-md-6 col-lg-8 col-xl-12 p-4 my-4 d-flex justify-content-center flex-column right-box">
            <div class="row align-items-center">
                <div class="header mb-3 mx-auto">
                    <h1>Welcome back!</h1>
                    <small class="h5 pb-3">Are you ready to cook?</small>
                    <p class="h2 text-uppercase fw-bold mt-3">Log in</p>
                </div>
                <form action="{{ route('password.username') }}" method="POST">
                    @csrf

                    <!-- Username -->
                    <div class="input-group my-2 mt-3">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('username') is-invalid @enderror form-control-lg bg-light fs-6"
                            name="username" id="username" placeholder="" required style="background: transparent; border:none; box-shadow:none; border-bottom: 1px solid gray; border-radius:0;"
                            value="{{ old('username') }}">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <label for="username" class="text-capitalize">Username</label>
                        </div>
                    </div>
                    <div class="input-group my-1">
                        <button class="btn btn-lg w-100 fs-5 reg-btn" type="submit">Reset Password</button>
                    </div>

                </form>
                <div class="row">
                    <span><a href="{{route('login')}}">Log in</a></span>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection

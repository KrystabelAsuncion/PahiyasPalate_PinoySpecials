@extends('auth.layout')

@section('content')

@if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
@if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif

<div class="container main d-flex justify-container-center align-items-center min-vh-100">
    <div class="row mx-auto img-area">
        <div class="col-md-6 col-lg-8 col-xl-12 d-block p-3 mx-auto justify-content-center">
            <img src="{{asset('img/logo_ic/logo11.PNG')}}" class="img-fluid">
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
                <form action="{{ route('authenticate') }}" method="POST">
                    @csrf

                    <!--Email-->
                    <div class="input-group my-2 mt-3">
                        <div class="form-floating">
                            <input type="text" class="form-control @error ('email') is-invalid @enderror form-control-lg bg-light fs-6"
                            name="email" id="email" placeholder="" required style="background: transparent; border:none; box-shadow:none; border-bottom: 1px solid gray; border-radius:0;"
                            value="{{old('email')}}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                            <label for="email" class="text-capitalize">Email</label>
                        </div>
                    </div>
                    <!--password-->
                    <div class="input-group my-2 mt-3">
                        <div class="form-floating">
                            <input type="password" class="form-control @error ('password') is-invalid @enderror form-control-lg bg-light fs-6"
                            name="password" id="password" placeholder="" required style="background: transparent; border:none; box-shadow:none; border-bottom: 1px solid gray; border-radius:0;"
                            value="{{old('password')}}">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif
                            <label for="password" class="text-capitalize">Password</label>
                            <small id="passwordHelpInline_pw" class="justify-content-start fw-bold text-muted" style="margin-right: 145px; visibility:hidden;">Must be 8 to 12 characters long.</small>
                        </div>
                    </div>

                    <div class="input-group mt-1 justify-content-start">
                        <p class="fs-6">Don't have an account? <a href="{{route('register')}}" class="text-secondary fw-bold link {{(request()->is('login')) ? 'active' : ''}}">Reigster</a></p>
                    </div>

                    <div class="input-group my-1">
                        <button class="btn btn-lg w-100 fs-5 reg-btn" type="submit">Log in</button>
                    </div>

                    <div class="input-group my-2 justify-content-start">
                        <p class="fs-6"><a href="{{route('password.request')}}" class="text-secondary fw-bold link">Forgot Password?</a></p>
                    </div>

                </form>
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

@extends('Auth.layout')
@section('content')


<div class="container main d-flex justify-container-center align-items-center min-vh-100">
    <div class="row mx-auto img-area">
        <div class="col-md-6 col-lg-8 col-xl-12 d-block mx-auto justify-content-center">
            <img src="{{asset('img/logo_ic/logo 1.png')}}" class="img-fluid">
            <p class="display-4 fw-bold text-center text-uppercase text-welcome">Welcome to pinoy specials!</h1>
        </div>
    </div>
    <div class="row border rounded-5 px-5 mx-auto shadow text-center bg-white">
        <div class="col-md-6 col-lg-8 col-xl-12 p-4 my-4 d-flex justify-content-center flex-column right-box">
            <div class="row align-items-center">
                <div class="header mb-3 mx-auto">
                    <h1>Reset your Password</h1>
                    <p class="h2 text-uppercase fw-bold mt-3">Enter a new password</p>
                </div>

                <form action="{{ route('password.update') }}" method="POST">
                    @csrf

                    <!-- Include the username and token from the session -->
                    <input type="hidden" name="username" value="{{ session('reset_username') }}">
                    <input type="hidden" name="token" value="{{ session('reset_token') }}">


                    <!-- password -->
                    <div class="input-group my-2 mt-3">
                        <div class="form-floating">
                            <input type="password" class="form-control @error('password') is-invalid @enderror form-control-lg bg-light fs-6" name="password" id="password" placeholder="" required style="background: transparent; border:none; box-shadow:none; border-bottom: 1px solid gray; border-radius:0;">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <label for="password" class="text-capitalize">New Password</label>
                            <small id="passwordHelpInline_pw" class="justify-content-start fw-bold text-muted">Must be 8 to 12 characters long.</small>
                        </div>
                    </div>

                    <!-- confirm password -->
                    <div class="input-group my-1">
                        <div class="form-floating">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" name="password_confirmation" id="password_confirmation" placeholder="" required style="background: transparent; border:none; box-shadow:none; border-bottom: 1px solid gray; border-radius:0;">
                            <label for="password_confirmation" class="text-capitalize">Confirm password</label>
                        </div>
                    </div>

                    <div class="input-group my-1">
                        <button class="btn btn-lg w-100 fs-5 reg-btn" type="submit">Reset Password</button>
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

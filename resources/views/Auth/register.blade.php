@extends('Auth.layout')

@section('content')

<div class="container main d-flex justify-container-center align-items-center min-vh-100">
    <div class="row mx-auto img-area">
        <div class="col-md-6 col-lg-8 col-xl-12 d-sm-none d-lg-block p-3 mx-auto justify-content-center">
            <img src="{{asset('img/logo_ic/logo11.png')}}" class="img-fluid">
        </div>
    </div>
    <div class="row border rounded-5 px-5 mx-auto shadow text-center bg-white">
        <div class="col-md-6 col-lg-8 col-xl-12 p-4 d-flex justify-content-center flex-column right-box">
            <div class="row align-items-center">
                <div class="header mb-3 mx-auto">
                    <p class="h1 text-uppercase fw-bold">REGISTER</p>
                </div>
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <!--username-->
                    <div class="input-group my-2">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('username')is-invalid @enderror form-control-lg bg-light fs-6"
                            name="username" id="username" placeholder="" style="background: transparent; border: none; box-shadow: none; border-bottom:1px solid gray; border-radius: 0;"
                            value="{{old('username')}}" required>
                            @if ($errors->has('username'))
                                <span class="text-danger">{{$errors->first('username')}}</span>
                            @endif
                            <label for="username" class="text-capitalize">Username</label>
                        </div>
                    </div>
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
                            <small id="passwordHelpInline_pw" class="justify-content-start fw-bold text-muted" style="margin-right: 145px; visibility:hidden; font-size:10px;">Must be 8 to 12 characters long.</small>
                        </div>
                    </div>
                    <!--confirm pass-->
                    <div class="input-group">
                        <div class="form-floating">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" name="password_confirmation" id="password_confirmation" placeholder="" required
                            style="background: transparent; border:none; box-shadow:none; border-bottom: 1px solid gray; border-radius:0;">
                            <label for="password_confirmation" class="text-capitalize">Confirm password</label>
                            <small id="passwordHelpInline_conpw" class="justify-content-start fw-bold text-muted" style="margin-right: 145px; visibility:hidden; font-size:10px;">Must be 8 to 12 characters long.</small>
                        </div>
                    </div>

                    <div class="input-group my-1 justify-content-start">
                        <p class="fs-6">Already have an account? <a href="{{route('login')}}" class="text-secondary fw-bold link {{(request()->is('login')) ? 'active' : ''}}">Log in</a></p>
                    </div>
                    <div class="input-group my-1">
                        <button class="btn btn-lg w-100 fs-5 reg-btn" type="submit">Register</button>
                    </div>

                    <div class="input-group mt-2">
                        <a class="btn btn-lg btn-outline-secondary w-100 fs-5" type="button" href="{{route('registerAsGuest')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-person mx-2" viewBox="2 1 15 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                            </svg> Guest mode
                        </a>
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

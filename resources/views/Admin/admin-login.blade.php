@extends('Admin.layout')

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

<style>

    .log-btn {
        background-color: transparent;
        border-style: solid;
        border-color: #ECA766;
        border-width: 1px;
        color: #ECA766;
        font-weight: bold;
        transition: background-color 0.2s ease-in-out;
        outline: none !important;
    }
    .log-btn:hover {
        background-color: #ECA766 !important;
        color: white !important;
        font-weight: 600;
    }
    .log-btn:active {
        background-color: #ECA766;
        color: white;
        font-weight: 600;
    }

    /* CSS styles for the input box */
    .email-box .form-floating input[type="text"] {
        background: white !important;
        box-shadow: black !important;
        border: 1px solid rgb(185, 183, 183) !important;
        border-radius: 10px !important;
        font-size: 20px;
    }

    .email-box .form-floating label {
        text-transform: capitalize;
        color: black;
    }

    .email-box .form-floating .text-danger {
        font-size: 14px;
        color: red;
    }

    .password-box .form-floating input[type="password"] {
        background: white !important;
        box-shadow: black !important;
        border: 1px solid rgb(185, 183, 183) !important;
        border-radius: 10px !important;
        font-size: 16px;
    }
    .password-box .form-floating input[type="text"] {
        background: white !important;
        box-shadow: black !important;
        border: 1px solid rgb(185, 183, 183) !important;
        border-radius: 10px !important;
        font-size: 16px;
    }

    .password-box .form-floating label {
        text-transform: capitalize;
        color: black;
    }

    .password-box .form-floating .text-danger {
        font-size: 14px;
        color: red;
    }

    /* CSS styles for the show/hide toggle button */
    .password-box .form-floating {
        position: relative;

    }

    .password-box .form-floating .btn-toggle-password {
        position: absolute;
        top: 40%;
        right: 10px;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        cursor: pointer;
    }




</style>

<div class="container main d-flex justify-container-center align-items-center min-vh-100">

    <div class="row border rounded-5 px-5 mx-auto shadow text-center" style="background-color: bisque;">
        <div class="col-md-6 col-lg-8 col-xl-12 p-4 my-4 d-flex justify-content-center flex-column right-box">
            <div class="row align-items-center">
                <div class="header mb-3 mx-auto">
                    <h1>Admin login</h1>
                </div>
                <form action="{{ route('authenticate') }}" method="POST">
                    @csrf

                    <!--Email-->
                    <div class="input-group my-2 mt-3 email-box">
                        <div class="form-floating">
                            <input type="text" class="form-control @error ('email') is-invalid @enderror form-control-lg bg-light fs-6"
                            name="email" id="email" placeholder="" required
                            style="background: transparent; border:none; box-shadow:none; border-bottom: 1px solid gray; border-radius:0;"
                            value="{{old('email')}}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                            <label for="email" class="text-capitalize">Email</label>
                        </div>
                    </div>
                    <!--password-->
                    <div class="input-group my-2 mt-3 password-box">
                        <div class="form-floating position-relative">
                            <input type="password" class="form-control @error('password') is-invalid @enderror form-control-lg bg-light fs-6"
                            style="background: transparent; border:none; box-shadow:none; border-bottom: 1px solid gray; border-radius:0;"
                                name="password" id="password" placeholder="" required
                                value="{{old('password')}}" />
                            @if ($errors->has('password'))
                            <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif
                            <label for="password" class="text-capitalize">Password</label>
                            <button class="btn btn-toggle-password" id="togglePassword" type="button">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </button>
                            <small id="passwordHelpInline_pw" class="justify-content-start fw-bold text-muted"
                                style="margin-right: 145px; visibility:hidden; font-size:10px;">Must be 8 to 12 characters long.</small>
                        </div>


                    </div>

                    <div class="input-group mt-1 justify-content-start reg-btn">
                        <p class="fs-6">Don't have an account? <a href="{{route('register')}}" class="text-secondary fw-bold link {{(request()->is('login')) ? 'active' : ''}}">Reigster</a></p>
                    </div>

                    <div class="input-group my-1">
                        <button class="btn btn-lg w-100 fs-5 log-btn" type="submit">Log in</button>
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

<script src="https://kit.fontawesome.com/9777ed90cd.js" crossorigin="anonymous"></script>
<script>
    // JavaScript function to toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
        var passwordInput = document.getElementById('password');
        var toggleButton = this;

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordInput.classList.add('show-password');
            toggleButton.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>'; // Change icon to eye
        } else {
            passwordInput.type = 'password';
            passwordInput.classList.remove('show-password');
            toggleButton.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>'; // Change icon to eye-slash
        }
    });
</script>



@endsection

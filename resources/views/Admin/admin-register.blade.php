@extends('Admin.layout')

@section('content')

<style>

    .reg-btn {
        background-color: transparent;
        border-style: solid;
        border-color: #ECA766;
        border-width: 1px;
        color: #ECA766;
        font-weight: bold;
        transition: background-color 0.2s ease-in-out;
        outline: none !important;
    }
    .reg-btn:hover {
        background-color: #ECA766 !important;
        color: white !important;
        font-weight: 600;
    }
    .reg-btn:active {
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
    .confirm-box .form-floating input[type="password"] {
        background: white !important;
        box-shadow: black !important;
        border: 1px solid rgb(185, 183, 183) !important;
        border-radius: 10px !important;
        font-size: 16px;
    }
    .confirm-box .form-floating input[type="text"] {
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

    .username-box .form-floating input[type="text"] {
        background: white !important;
        box-shadow: black !important;
        border: 1px solid rgb(185, 183, 183) !important;
        border-radius: 10px !important;
        font-size: 20px;
    }

    .username-box .form-floating label {
        text-transform: capitalize;
        color: black;
    }

    .username-box .form-floating .text-danger {
        font-size: 14px;
        color: red;
    }

    .confirm-box .form-floating label {
        text-transform: capitalize;
        color: black;
    }

    .confirm-box .form-floating .text-danger {
        font-size: 14px;
        color: red;
    }

    /* CSS styles for the show/hide toggle button */
    .confirm-box .form-floating {
        position: relative;

    }

    .confirm-box .form-floating .btn-toggle-Confirmpassword {
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
        <div class="col-md-6 col-lg-10 col-xl-12 p-4 d-flex justify-content-center flex-column right-box">
            <div class="row align-items-center">
                <div class="header mb-3 mx-auto">
                    <p class="h1 text-uppercase fw-bold">ADMIN REGISTER</p>
                </div>
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <!--username-->
                    <div class="input-group my-2 username-box">
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
                    <div class="input-group my-2 mt-3 email-box">
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
                    <div class="input-group my-2 mt-3 password-box">
                        <div class="form-floating position-relative">
                            <input type="password" class="form-control @error ('password') is-invalid @enderror form-control-lg bg-light fs-6"
                            name="password" id="password" placeholder="" required style="background: transparent; border:none; box-shadow:none; border-bottom: 1px solid gray; border-radius:0;"
                            value="{{old('password')}}">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif
                            <label for="password" class="text-capitalize">Password</label>
                            <button class="btn btn-toggle-password" id="togglePassword" type="button">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </button>
                            <small id="passwordHelpInline_pw" class="justify-content-start fw-bold text-muted" style="margin-right: 145px; visibility:hidden; font-size:10px;">Must be 8 to 12 characters long.</small>

                        </div>
                    </div>
                    <!--confirm pass-->
                    <div class="input-group confirm-box">
                        <div class="form-floating position-relative">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" name="password_confirmation" id="password_confirmation" placeholder="" required
                            style="background: transparent; border:none; box-shadow:none; border-bottom: 1px solid gray; border-radius:0;">
                            <label for="password_confirmation" class="text-capitalize">Confirm password</label>
                            <button class="btn btn-toggle-Confirmpassword" id="toggleConfirmPassword" type="button">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </button>
                            <small id="passwordHelpInline_conpw" class="justify-content-start fw-bold text-muted" style="margin-right: 145px; visibility:hidden; font-size:10px;">Must be 8 to 12 characters long.</small>
                        </div>
                    </div>

                    <div class="input-group my-1 justify-content-start">
                        <p class="fs-6">Already have an account? <a href="{{route('login')}}" class="text-secondary fw-bold link {{(request()->is('login')) ? 'active' : ''}}">Log in</a></p>
                    </div>
                    <div class="input-group my-1">
                        <button class="btn btn-lg w-100 fs-5 reg-btn" type="submit">Register</button>
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

    document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
        var passwordInput = document.getElementById('password_confirmation');
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

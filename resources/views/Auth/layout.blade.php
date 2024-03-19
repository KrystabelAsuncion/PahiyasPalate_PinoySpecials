<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pinoy Specials</title>

    <link rel="icon" type="image/x-icon" href="{{asset('img/logo_ic/LOGO.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.google.com/specimen/Ubuntu?query=ubuntu">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
</head>
<style>

    nav{
        font-size:5px;
    }

    body {
        background-color: #FEE9D6;
    }

    .img-area {
        width: 450px;
    }

    .right-box {
        width: 350px;
        height: 100%;
    }
    .link {
        text-decoration: none;
    }
    .reg-btn {
        background-color: transparent;
        border-style: solid;
        border-color: #ECA766;
        border-width: 1px;
        color: #ECA766;
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
    .nav-link {
    cursor: pointer; /* Set cursor to pointer */
    }
    label.input{
        font-weight: bold;
        font-size: 15px;
    }
    .profile {
        border-radius: 20px;
    }


    .btn-outline-facebook {
        color: #3b5998;
        border: 2px solid #3b5998;
        transition: background-color 0.2s ease-in-out;
    }
    .btn-outline-facebook:hover
    {
        color: white !important;
        border: 2px solid #3b5998;
        background-color: #3b5998;
    }
    .btn-outline-facebook:active
    {
        color: #white !important;
        border: 2px solid #3b5998;
        background-color: #3b5998;
    }

    .btn-outline-instagram {
        color: #e4405f;
        border: 2px solid #e4405f;
        transition: background-color 0.2s ease-in-out;
    }
    .btn-outline-instagram:hover
    {
        color: white;
        border: 2px solid #e4405f;
        background-color: #e4405f;
    }
    .btn-outline-instagram:active
    {
        color: white!important;
        border: 2px solid #e4405f;
        background-color: #e4405f;
    }

    .btn-outline-twitter {
        color: #1c96e2;
        border: 2px solid #1c96e2;
        transition: background-color 0.2s ease-in-out;
    }
    .btn-outline-twitter:hover
    {
        color: white;
        border: 2px solid #1c96e2;
        background-color: #1c96e2;
    }
    .btn-outline-twitter:active
    {
        color: white !important;
        border: 2px solid #1c96e2;
        background-color: #1c96e2;
    }

    .btn-outline-viewRecipe {
        color: ;
        border: 2px solid rgba(187, 183, 183, 0.599);
        background-color: #ebb889;
        transition: background-color 0.2s ease-in-out;
    }
    .btn-outline-viewRecipe:hover {
        color: black;
        border: 2px solid #a98461;
        background-color: #ebb889;
    }
    .btn-outline-viewRecipe:active {
        color: white !important;
        border: 2px solid #ebb889;
        background-color: #fed8b5a5;
    }
    .btn-submit{
        color: black;
        background-color: #ebb889;
        transition: background-color 0.2s ease-in-out;
    }
    .btn-submit:hover{
        color: white;
        background-color: #a98461;
    }



    @media (max-width: 600px) {


        img {
            display: none;
        }
        .text-welcome {
            display: flex;
            margin: 3px;
        }
        .main {
            flex-direction: column;
            text-align: center;
        }
    }

    li{
        padding: 10px;
    }

    @media (max-width: 576px) {
        .display-2 {
            font-size: 2rem;
            text-align: center;
        }
    }



</style>

<body style="font-family: Ubuntu; box-sizing: border-box; background: #FEE9D6;">

    <div class="container-fluid main">
        @yield('content')
    </div>





    <script src="https://kit.fontawesome.com/9777ed90cd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var passwordInput = document.getElementById('password_confirmation');
            var helpText = document.getElementById('passwordHelpInline_conpw');

            passwordInput.addEventListener('focus', function () {
                helpText.style.visibility = 'visible';
            });

            passwordInput.addEventListener('blur', function () {
                helpText.style.visibility = 'hidden';
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            var passwordInput = document.getElementById('password');
            var helpText = document.getElementById('passwordHelpInline_pw');

            passwordInput.addEventListener('focus', function () {
                helpText.style.visibility = 'visible';
            });

            passwordInput.addEventListener('blur', function () {
                helpText.style.visibility = 'hidden';
            });
        });

        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
        });


    </script>
</body>
</html>

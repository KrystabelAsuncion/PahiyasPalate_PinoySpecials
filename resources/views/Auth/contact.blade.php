@extends('Auth.layout')
@section('content')
<nav class="navbar navbar-expand-lg sticky-top" style="background: #f7b87e;">
    <a href="#" class="navbar-brand">
        <img src="img/logo_ic/logo11.png" width="50" class="img-fluid px-2 mx-2">
        <span class="fw-bold h4">Pinoy Specials</span>
    </a>
    <button class="navbar-toggler mx-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon p-3"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav nav-underline d-flex justify-content-sm-center" role="tablist">
            <!--hometab-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <span class="h3">Home</span>
                </a>
            </li>
            <!--categories-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category') }}">
                    <span class="h3">Categories</span>
                </a>
            </li>

            <!--PopularTab-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('popular') }}">
                    <span class="h3">Popular</span>
                </a>
            </li>

            <!--add recipe-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('addrecipe') }}">
                    <span class="h3">Make Recipe</span>
                </a>
            </li>

            <!--AboutTab-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">
                    <span class="h3">About us</span>
                </a>
            </li>

            <!--contactTab-->
            <li class="nav-item active" role="presentation">
                <a class="nav-link active" id="contact-tab" data-bs-toggle="tab"
                href="#contactTabPane" role="tab" aria-controls="contactTabPane"
                aria-selected="true">
                    <span class="h3">Contact us</span>
                </a>
            </li>

            <!--Profile-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">
                    <img src="{{ asset(Auth::user()->profile_image) }}" alt="Profile Image" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                    <span class="h3 ms-2">{{Auth::user()->username}}</span>
                </a>
            </li>

        </ul>
    </div>
</nav>

<div class="tab-content">
        <!--contact-->
        <div class="tab-content" id="contactContent">

            <div class="tab-pane active" id="contactTabPane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">

                <div class="container-fluid">

                    <div class="row text-center my-4">
                        <h1 class="display-3 fw-bold">
                            WE’D LOVE TO HEAR FROM YOU!
                        </h1>
                    </div>

                    <div class="row text-center mb-4">
                        <h2 class="display-6 fs-1">
                            Thank you for your interest in Pahiyas Palate and Pinoy Specials!
                             Whether you have a question, a suggestion, or simply want to share your thoughts with us, we're here to listen.
                        </h2>
                    </div>

                    <div class="row shadow-lg p-4 mx-4" style="background-color: #f7b97edf; border-radius: 20px;">

                        <div class="row my-3">
                            <h1>
                                EMAIL
                            </h1>

                            <div class="row">
                                <p class="display-6 fs-2 ms-3">Feel free to drop us an email at <span><a href="">contact@pahiyaspalate.com</a></span> for any inquiries or collaborations.
                                     We strive to respond to all emails promptly.</p>
                            </div>
                        </div>

                        <div class="row">
                            <h1>
                                Socials
                            </h1>

                            <div class="row">
                                <p class="display-6 fs-2 ms-3">Connect with us on our social media platforms for the latest updates,
                                    behind-the-scenes glimpses, and delicious food inspirations:
                                </p>

                                <div class="row mx-auto text-center p-4">
                                    <div class="col justify-content-center">
                                        <a class="btn btn-outline-facebook text-center shadow" style="width: 30rem;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 18 18">
                                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                                            </svg>
                                            <span class="h2">Facebook</span>
                                        </a>
                                    </div>

                                    <div class="col justify-content-center">
                                        <button class="btn btn-outline-instagram text-center shadow" style="width: 30rem;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 18 18">
                                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                                              </svg>

                                            <span class="h2">Instagram</span>
                                        </button>
                                    </div>

                                    <div class="col justify-content-center">
                                        <button class="btn btn-outline-twitter text-center shadow" style="width: 30rem;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-twitter" viewBox="0 0 18 18">
                                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15"/>
                                            </svg>

                                            <span class="h2">Twitter</span>
                                        </button>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

@extends('Auth.layout')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-header">Guest mode</div>
                <div class="card-body">
                    <form action="{{ route('guest.name.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="guestname" class="form-label">Enter Name as Guest</label>
                            <input type="text" id="guestname" name="guest" class="form-control" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Register as Guest</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

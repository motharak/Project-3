@extends('layouts.login')
@section('pageTitle', 'Login')

@section('conten')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Login</h2>
            @if(Session::has('msg'))
            <div class="alert alert-primary d-inline-block px-3 py-1 my-1">
                {{ Session::get('msg') }}
            </div>
        @endif
            <form method="POST" action="{{ route('loginAc') }}" class="needs-validation" novalidate>
                @csrf

                <div class="form-group">
                    <label for="user">Username:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                    <div class="invalid-feedback">
                        Please enter your password.
                    </div>
                </div>

                <button type="submit" class="btn btn-primary my-3">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection

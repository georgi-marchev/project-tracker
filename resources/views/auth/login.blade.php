@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            @error('invalidCredentialsError') <div>{{ $message }}</div> @enderror

            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <div class="text-center">
            <p>Don't have an account? <a href="{{ route('register') }}" class="btn btn-link">Register</a></p>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <h2>Login</h2>

    <form action="{{ route('login.post') }}" method="POST">
        @csrf

        @error('invalidCredentialsError') <div>{{ $message }}</div> @enderror

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit">Login</button>
    </form>

@endsection
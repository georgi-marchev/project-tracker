@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h1>Edit Profile</h1>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <hr>

        <div class="mb-3">
            <label for="password">New Password (optional)</label>
            <input id="password" type="password" name="password" class="form-control">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <small class="text-muted">Leave blank to keep current password</small>
        </div>

        <div class="mb-3">
            <label for="password-confirmation">Confirm New Password</label>
            <input id="password-confirmation" type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="mb-3">
            <span id="password-match-message"></span>
        </div>

        <button class="btn btn-primary">Save Changes</button>
    </form>

    @push('scripts')
        <script src="{{ asset('js/password-confirmation.js') }}"></script>
    @endpush
@endsection

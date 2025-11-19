<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{  asset('css/style.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <script src="{{ asset('js/delete-modal.js') }}"></script>


</head>

<body>
    <header class="p-3 text-bg-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="d-flex justify-content-center">
                <img src="{{ asset('logo.svg') }}" id="logo" alt="Logo">
            </a>
            <div class=" d-flex justify-content-end">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
                @endguest
                @auth
                    <form action="{{ route('logout.post') }}" method="POST">
                        @csrf
                        <button type=" submit" class="btn btn-warning">Logout</button>
                    </form>
                @endauth
            </div>
        </div>

    </header>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
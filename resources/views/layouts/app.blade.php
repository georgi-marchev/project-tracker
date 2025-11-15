<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                @guest
                    <li><a href="{{ route('login.get') }}">Login</a></li>
                    <li><a href="{{ route('register.get') }}">Register</a></li>
                @endguest
            </ul>
            @auth
                <form action="{{ route('logout.post') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endauth
        </nav>
    </header>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
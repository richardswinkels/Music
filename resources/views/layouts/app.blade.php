<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="min-w-min">
    <header class="bg-gray-500 text-gray-100 w-full sm:text-left md:text-center flex justify-between items-center p-3">
        <div class="flex items-center">
			<a href="./"><img src="{{ asset('images/home.svg') }}" class="pr-4 w-14 text-white"></a>
			<h1 class="text-center text-4xl md:text-5xl">@yield('title')</h1>
			</div>
		</div>
            @auth
            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="underline">Logout</button>
                </form>
            </div>
            @endauth
            @guest
            <div>
                <a class="underline" href="{{ route('login') }}">Login</a>
                <a class="underline ml-2" href="{{ route('register') }}">Register</a>
            </div>
            @endguest
        </div>
    </header>
    <main class="container mx-auto">
    @yield('content')
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'AnabulRadar')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">

    @auth
        <nav class="bg-white shadow-md">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'AnabulRadar') }}" class="w-24 h-auto" style="height:auto;" />
                </a>

                <div class="flex items-center gap-6">

                    <a href="{{ route('dashboard') }}" class="hover:text-amber-700">
                        Dashboard
                    </a>

                    <a href="{{ route('pet-reports.index') }}" class="hover:text-amber-700">
                        Pet Reports
                    </a>

                    <a href="{{ route('profile.edit') }}" class="hover:text-amber-700">
                        Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="text-red-500 hover:text-red-700">
                            Logout
                        </button>
                    </form>

                </div>

            </div>
        </nav>
    @endauth

    <main class="py-8">
        @hasSection('content')
            @yield('content')
        @else
            {{ $slot }}
        @endif
    </main>

</body>

</html>
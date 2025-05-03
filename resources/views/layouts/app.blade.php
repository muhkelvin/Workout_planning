<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'FitFlow') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500&family=Lato:ital@0;1&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-inter bg-[#F5F5F5]">
<!-- Navbar -->
<nav class="bg-[#2D3A4B] fixed w-full z-10 shadow-lg">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-2xl font-poppins font-semibold text-[#FFFFFF] hover:text-[#6D9B9B] transition-colors">
            {{ config('app.name', 'FitFlow') }}
        </a>

        <div class="space-x-6">
            @auth
                <a href="{{ route('home') }}" class="text-[#FFFFFF] hover:text-[#FF7F7F] font-medium transition-colors">Home</a>
                <a href="{{ route('workouts.index') }}" class="text-[#FFFFFF] hover:text-[#FF7F7F] font-medium transition-colors">Workouts</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-[#FFFFFF] hover:text-[#FF7F7F] font-medium">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-[#FFFFFF] hover:text-[#FF7F7F] font-medium">Login</a>
                <a href="{{ route('register') }}" class="bg-[#FF7F7F] text-white px-4 py-2 rounded-lg hover:bg-[#e66d6d] transition-colors">
                    Get Started
                </a>
            @endauth
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="container mx-auto px-4 pt-24 pb-12">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-[#2D3A4B] border-t-4 border-[#E8C4C4] mt-12">
    <div class="container mx-auto px-4 py-8">
        <div class="text-center text-[#FFFFFF] space-y-4">
            <p class="font-poppins text-lg">Transform Your Fitness Journey</p>
            <div class="flex justify-center space-x-6">
                <a href="#" class="hover:text-[#6D9B9B] transition-colors">About</a>
                <a href="#" class="hover:text-[#6D9B9B] transition-colors">Contact</a>
                <a href="#" class="hover:text-[#6D9B9B] transition-colors">Privacy</a>
            </div>
            <p class="text-sm text-[#E8C4C4]">&copy; {{ date('Y') }} {{ config('app.name', 'FitFlow') }}. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>

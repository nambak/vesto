<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    @include('partials.head', ['title' => $title ?? 'Vesto - Login'])
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 50%, #7dd3fc 100%);
        }

        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="text-gray-900">
<!-- Header -->
<header class="fixed top-0 w-full bg-white/95 backdrop-blur-md z-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900" wire:navigate>Vesto</a>
            </div>

            <!-- Navigation -->
            <nav class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900 transition-colors" wire:navigate>Home</a>
                <div class="relative group">
                    <a href="#" class="text-gray-700 hover:text-gray-900 transition-colors flex items-center">
                        Shop
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                </div>
                <div class="relative group">
                    <a href="#" class="text-gray-700 hover:text-gray-900 transition-colors flex items-center">
                        Pages
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                </div>
                <a href="#" class="text-gray-700 hover:text-gray-900 transition-colors">Blog</a>
                <a href="#" class="text-gray-700 hover:text-gray-900 transition-colors">Contact Us</a>
            </nav>

            <!-- Right Icons -->
            <div class="flex items-center space-x-4">
                <button class="p-2 text-gray-700 hover:text-gray-900 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
                @auth
                    <a href="{{ route('dashboard') }}" class="p-2 text-gray-700 hover:text-gray-900 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="p-2 text-gray-700 hover:text-gray-900 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </a>
                @endauth
                <button class="p-2 text-gray-700 hover:text-gray-900 transition-colors relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-13v1a3 3 0 11-6 0v-1m6 0a3 3 0 11-6 0m6 0H9"></path>
                    </svg>
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">2</span>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Login Section -->
<section class="pt-20 min-h-screen hero-gradient flex items-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="flex justify-center">
            <div class="w-full max-w-md bg-white/90 backdrop-blur-md rounded-2xl shadow-xl p-8 animate-slide-up">
                {{ $slot }}
            </div>
        </div>
    </div>
</section>

</body>
</html>

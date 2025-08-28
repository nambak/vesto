<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vesto - Modern Fashion Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            900: '#0c4a6e'
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'zoom-in': 'zoomIn 0.5s ease-out'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {opacity: '0'},
                            '100%': {opacity: '1'}
                        },
                        slideUp: {
                            '0%': {opacity: '0', transform: 'translateY(30px)'},
                            '100%': {opacity: '1', transform: 'translateY(0)'}
                        },
                        zoomIn: {
                            '0%': {opacity: '0', transform: 'scale(0.95)'},
                            '100%': {opacity: '1', transform: 'scale(1)'}
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

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
                <h1 class="text-2xl font-bold text-gray-900">Vesto</h1>
            </div>

            <!-- Navigation -->
            <nav class="hidden lg:flex items-center space-x-8">
                <a href="#" class="text-gray-700 hover:text-gray-900 transition-colors">Home</a>
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
                <button class="p-2 text-gray-700 hover:text-gray-900 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </button>
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

<!-- Hero Section -->
<section class="pt-20 min-h-screen hero-gradient flex items-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="animate-slide-up">
                <div class="text-sm font-medium text-primary-600 mb-4 tracking-wide uppercase">
                    URBAN EDGE
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 leading-tight text-shadow">
                    Jackets for the<br>
                    Modern Man
                </h1>
                <p class="text-lg text-gray-600 mb-8 max-w-md">
                    Discover our premium collection of contemporary jackets designed for the urban lifestyle.
                </p>
                <button class="bg-gray-900 text-white px-8 py-3 rounded-md font-medium hover:bg-gray-800 transition-colors">
                    Discover Now
                </button>
            </div>

            <!-- Right Image -->
            <div class="relative animate-zoom-in">
                <div class="aspect-square bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl overflow-hidden">
                    <img
                            src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAwIiBoZWlnaHQ9IjYwMCIgdmlld0JveD0iMCAwIDYwMCA2MDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI2MDAiIGhlaWdodD0iNjAwIiBmaWxsPSIjRjNGNEY2Ii8+CjxjaXJjbGUgY3g9IjMwMCIgY3k9IjMwMCIgcj0iMTAwIiBmaWxsPSIjMDU2OUEwIiBmaWxsLW9wYWNpdHk9IjAuMiIvPgo8dGV4dCB4PSIzMDAiIHk9IjMyMCIgZm9udC1mYW1pbHk9IkludGVyIiBmb250LXNpemU9IjcyIiBmb250LXdlaWdodD0iYm9sZCIgZmlsbD0iIzA1NjlBMCIgdGV4dC1hbmNob3I9Im1pZGRsZSI+8J+RlTwvdGV4dD4KPC9zdmc+Cg=="
                            alt="Modern Man Fashion"
                            class="w-full h-full object-cover"
                    />
                </div>
                <!-- Navigation Arrows -->
                <button class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 p-3 rounded-full shadow-lg hover:bg-white transition-colors">
                    <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 p-3 rounded-full shadow-lg hover:bg-white transition-colors">
                    <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- New Arrivals Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">New Arrivals</h2>

            <!-- Category Tabs -->
            <div class="flex justify-center space-x-8 mb-8">
                <button class="text-gray-900 font-medium border-b-2 border-gray-900 pb-2">WOMEN</button>
                <button class="text-gray-500 hover:text-gray-900 font-medium pb-2 transition-colors">MEN</button>
                <button class="text-gray-500 hover:text-gray-900 font-medium pb-2 transition-colors">BAGS</button>
                <button class="text-gray-500 hover:text-gray-900 font-medium pb-2 transition-colors">KIDS</button>
                <button class="text-gray-500 hover:text-gray-900 font-medium pb-2 transition-colors">ACCESSORIES
                </button>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
            <!-- Product 1 -->
            <div class="group">
                <div class="aspect-square bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg overflow-hidden mb-4 flex items-center justify-center">
                    <span class="text-6xl">👕</span>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">SHIRTS</p>
                    <h3 class="font-medium text-gray-900 mb-1">adidas X Pep Polo shirt, navy / blue</h3>
                    <p class="text-sm text-gray-600">$59.99</p>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="group">
                <div class="aspect-square bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg overflow-hidden mb-4 flex items-center justify-center">
                    <span class="text-6xl">👟</span>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">SHOES</p>
                    <h3 class="font-medium text-gray-900 mb-1">adidas x Pep TNY Vintage, navy / white</h3>
                    <p class="text-sm text-gray-600">$129.99</p>
                    <div class="flex justify-center mt-1">
                        <div class="flex space-x-1">
                            <span class="text-yellow-400 text-xs">★★★★★</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="group">
                <div class="aspect-square bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg overflow-hidden mb-4 flex items-center justify-center">
                    <span class="text-6xl">🧥</span>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">JACKET</p>
                    <h3 class="font-medium text-gray-900 mb-1">adidas X Pep Bombardier Track Jacket</h3>
                    <p class="text-sm text-gray-600">$239.99</p>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="group">
                <div class="aspect-square bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg overflow-hidden mb-4 flex items-center justify-center">
                    <span class="text-6xl">👔</span>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">SHIRTS</p>
                    <h3 class="font-medium text-gray-900 mb-1">adidas X Pep Classic t-shirt, grey / navy</h3>
                    <p class="text-sm text-gray-600">$39.99</p>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="group">
                <div class="aspect-square bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg overflow-hidden mb-4 flex items-center justify-center">
                    <span class="text-6xl">🧢</span>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">HATS</p>
                    <h3 class="font-medium text-gray-900 mb-1">adidas X Pep SL Cap, navy / white</h3>
                    <p class="text-sm text-gray-600">$29.99</p>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="group">
                <div class="aspect-square bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg overflow-hidden mb-4 flex items-center justify-center">
                    <span class="text-6xl">👕</span>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">HOODIES</p>
                    <h3 class="font-medium text-gray-900 mb-1">Butter Yezz Pullover Hood, denim</h3>
                    <p class="text-sm text-gray-600">$89.99</p>
                </div>
            </div>

            <!-- Product 7 -->
            <div class="group">
                <div class="aspect-square bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg overflow-hidden mb-4 flex items-center justify-center">
                    <span class="text-6xl">👕</span>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">SHIRTS</p>
                    <h3 class="font-medium text-gray-900 mb-1">Flems Rug Puff t-shirt, white</h3>
                    <p class="text-sm text-gray-600">$49.99</p>
                </div>
            </div>

            <!-- Product 8 -->
            <div class="group">
                <div class="aspect-square bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg overflow-hidden mb-4 flex items-center justify-center">
                    <span class="text-6xl">👕</span>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">SHIRTS</p>
                    <h3 class="font-medium text-gray-900 mb-1">Carhartt L/S Descanters knock kneak Sweet</h3>
                    <p class="text-sm text-gray-600">$129.99</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Featured Collections Grid (Bottom Section) -->
<section class="py-0 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 md:grid-rows-2 gap-0 h-auto md:h-[800px]">
            <!-- Collection 1 - Ethereal Elegance (세로 2행 병합) -->
            <div class="relative bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 h-96 md:h-full md:row-span-2 group overflow-hidden">
                <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition-all duration-300"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="text-9xl opacity-20 text-white">👨</span>
                </div>
                <div class="absolute bottom-8 left-8 text-white">
                    <p class="text-xs uppercase tracking-widest mb-2 text-gray-200">ETHEREAL ELEGANCE</p>
                    <h3 class="text-2xl font-bold mb-4 leading-tight">Where Dreams<br>Meet Couture</h3>
                    <button class="text-sm font-medium underline hover:no-underline transition-all duration-300 hover:text-gray-200">
                        Shop Now
                    </button>
                </div>
            </div>

            <!-- Collection 2 - Enchanting Styles (가로 2열 병합) -->
            <div class="relative bg-gradient-to-br from-blue-400 via-blue-500 to-blue-600 h-96 md:col-span-2 md:h-full group overflow-hidden">
                <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition-all duration-300"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="text-9xl opacity-20 text-white">👩</span>
                </div>
                <div class="absolute bottom-8 left-8 text-white">
                    <p class="text-xs uppercase tracking-widest mb-2 text-blue-100">RADIANT REVERIE</p>
                    <h3 class="text-2xl font-bold mb-4 leading-tight">Enchanting Styles<br>for Every Woman</h3>
                    <button class="text-sm font-medium underline hover:no-underline transition-all duration-300 hover:text-blue-100">
                        Shop Now
                    </button>
                </div>
            </div>

            <!-- Collection 3 - Chic Footwear -->
            <div class="relative bg-gradient-to-br from-gray-300 via-gray-400 to-gray-500 h-96 md:h-full group overflow-hidden">
                <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition-all duration-300"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="text-9xl opacity-20 text-white">👟</span>
                </div>
                <div class="absolute bottom-8 left-8 text-white">
                    <p class="text-xs uppercase tracking-widest mb-2 text-gray-200">URBAN COLLECTION</p>
                    <h3 class="text-2xl font-bold mb-4 leading-tight">Chic Footwear for<br>City Living</h3>
                    <button class="text-sm font-medium underline hover:no-underline transition-all duration-300 hover:text-gray-200">
                        Shop Now
                    </button>
                </div>
            </div>

            <!-- Collection 4 - Trendsetting Bags -->
            <div class="relative bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700 h-96 md:h-full group overflow-hidden">
                <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition-all duration-300"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="text-9xl opacity-20 text-white">👜</span>
                </div>
                <div class="absolute bottom-8 left-8 text-white">
                    <p class="text-xs uppercase tracking-widest mb-2 text-blue-100">TRENDSETTING</p>
                    <h3 class="text-xl font-bold mb-2 leading-tight">Trendsetting Bags for Her</h3>
                    <div class="text-4xl font-black mb-3 text-yellow-300">50%</div>
                    <button class="text-sm font-medium underline hover:no-underline transition-all duration-300 hover:text-blue-100">
                        Shop Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-16 bg-primary-900 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Stay in the Loop</h2>
        <p class="text-lg text-primary-100 mb-8">
            Subscribe to our newsletter and get 10% off your first order
        </p>
        <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4 max-w-md mx-auto">
            <input
                    type="email"
                    placeholder="Enter your email"
                    class="w-full px-4 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500"
            >
            <button class="w-full sm:w-auto px-6 py-3 bg-white text-primary-900 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                Subscribe
            </button>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <div>
                <h3 class="text-xl font-bold mb-4">Vesto</h3>
                <p class="text-gray-400 mb-4">Elevating your style with premium fashion pieces for the modern
                    lifestyle.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
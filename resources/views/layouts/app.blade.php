<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        @include('layouts.alert')

        <div class="flex min-h-screen">
            <!-- Mobile Sidebar Overlay -->
            <div id="mobile-sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>

            <!-- Sidebar -->
            <div id="sidebar" class="fixed inset-y-0 left-0 w-64 h-screen bg-cyan-300 text-white px-5 py-6 lg:py-10 z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
                <!-- Mobile Close Button -->
                <button id="close-sidebar" class="absolute top-4 right-4 lg:hidden text-gray-900 hover:text-gray-600">
                    <i class="ri-close-line text-2xl"></i>
                </button>

                <img src="{{ asset('setistyle.png') }}" alt="Logo" class="w-8/12 mx-auto rounded-lg mb-6 lg:mb-10">

                <div class="space-y-3 lg:space-y-4 text-gray-900 overflow-y-auto max-h-[calc(100vh-200px)]">
                    <a href="{{route('dashboard')}}" class="flex items-center space-x-3 text-base lg:text-lg p-2 lg:p-3 rounded-md transition-all duration-300 {{ request()->routeIs('dashboard') ? 'bg-yellow-400 text-gray-800 shadow-md' : 'hover:bg-yellow-400 hover:text-gray-800' }}">
                        <i class="ri-dashboard-line text-lg lg:text-xl"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{route('categories.index')}}" class="flex items-center space-x-3 text-base lg:text-lg p-2 lg:p-3 rounded-md transition-all duration-300 {{ request()->routeIs('categories.*') ? 'bg-yellow-400 text-gray-800 shadow-md' : 'hover:bg-yellow-400 hover:text-gray-800' }}">
                        <i class="ri-pages-line text-lg lg:text-xl"></i>
                        <span>Category</span>
                    </a>
                    <a href="{{route('products.index')}}" class="flex items-center space-x-3 text-base lg:text-lg p-2 lg:p-3 rounded-md transition-all duration-300 {{ request()->routeIs('products.*') ? 'bg-yellow-400 text-gray-800 shadow-md' : 'hover:bg-yellow-400 hover:text-gray-800' }}">
                        <i class="ri-product-hunt-line text-lg lg:text-xl"></i>
                        <span>Product</span>
                    </a>
                    <a href="{{route('brand.index')}}" class="flex items-center space-x-3 text-base lg:text-lg p-2 lg:p-3 rounded-md transition-all duration-300 {{ request()->routeIs('brand.*') ? 'bg-yellow-400 text-gray-800 shadow-md' : 'hover:bg-yellow-400 hover:text-gray-800' }}">
                        <i class="ri-customer-service-line text-lg lg:text-xl"></i>
                        <span>Brand</span>
                    </a>
                    <a href="{{route('orders.index')}}" class="flex items-center space-x-3 text-base lg:text-lg p-2 lg:p-3 rounded-md transition-all duration-300 {{ request()->routeIs('orders.*') ? 'bg-yellow-400 text-gray-800 shadow-md' : 'hover:bg-yellow-400 hover:text-gray-800' }}">
                        <i class="ri-file-list-3-line text-lg lg:text-xl"></i>
                        <span>Orders</span>
                    </a>

                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center space-x-3 w-full text-gray-900 hover:bg-red-700 hover:text-white p-2 lg:p-3 rounded-md text-base lg:text-lg transition-all duration-300">
                            <i class="ri-logout-box-line text-lg lg:text-xl"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 ml-0 lg:ml-64">
                <!-- Top Bar for Mobile -->
                <div class="lg:hidden bg-white shadow-sm px-4 py-3 flex items-center justify-between sticky top-0 z-30">
                    <button id="open-sidebar" class="text-gray-600 hover:text-gray-900">
                        <i class="ri-menu-line text-2xl"></i>
                    </button>
                    <h1 class="text-lg font-semibold text-gray-800">@yield('title')</h1>
                    <div class="w-8"></div> <!-- Spacer for centering -->
                </div>

                <div class="p-4 lg:p-10">
                    <h1 class="hidden lg:block text-2xl lg:text-4xl font-bold text-gray-800 mb-4 lg:mb-0">@yield('title')</h1>
                    <hr class="my-3 lg:my-5 border-t-2 lg:border-t-4 border-yellow-400">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Mobile Sidebar JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('mobile-sidebar-overlay');
                const openButton = document.getElementById('open-sidebar');
                const closeButton = document.getElementById('close-sidebar');

                function openSidebar() {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }

                function closeSidebar() {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                    document.body.style.overflow = '';
                }

                // Event listeners
                if (openButton) {
                    openButton.addEventListener('click', openSidebar);
                }

                if (closeButton) {
                    closeButton.addEventListener('click', closeSidebar);
                }

                if (overlay) {
                    overlay.addEventListener('click', closeSidebar);
                }

                // Close sidebar on window resize to desktop size
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 1024) {
                        closeSidebar();
                    }
                });

                // Handle escape key
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape') {
                        closeSidebar();
                    }
                });
            });
        </script>
    </body>
</html>

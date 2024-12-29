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

        <div class="flex">
            <!-- Sidebar -->
            <div class="w-64 h-screen bg-cyan-300 text-white sticky top-0 px-5 py-10">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-8/12 mx-auto mb-10">

                <div class="space-y-4 text-gray-900">
                    <a href="{{route('dashboard')}}" class="flex items-center space-x-3 text-lg hover:bg-yellow-400 hover:text-gray-800 p-3 rounded-md">
                        <i class="ri-dashboard-line text-xl"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{route('categories.index')}}" class="flex items-center space-x-3 text-lg hover:bg-yellow-400 hover:text-gray-800 p-3 rounded-md">
                        <i class="ri-pages-line text-xl"></i>
                        <span>Category</span>
                    </a>
                    <a href="{{route('products.index')}}" class="flex items-center space-x-3 text-lg hover:bg-yellow-400 hover:text-gray-800 p-3 rounded-md">
                        <i class="ri-product-hunt-line text-xl"></i>
                        <span>Product</span>
                    </a>
                    <a href="{{route('brand.index')}}" class="flex items-center space-x-3 text-lg hover:bg-yellow-400 hover:text-gray-800 p-3 rounded-md">
                        <i class="ri-customer-service-line text-xl"></i>
                        <span>Brand</span>
                    </a>
                    <a href="{{route('orders.index')}}" class="flex items-center space-x-3 text-lg hover:bg-yellow-400 hover:text-gray-800 p-3 rounded-md">
                        <i class="ri-file-list-3-line text-xl"></i>
                        <span>Orders</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-lg hover:bg-yellow-400 hover:text-gray-800 p-3 rounded-md">
                        <i class="ri-user-line text-xl"></i>
                        <span>Users</span>
                    </a>

                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center space-x-3 w-full text-gray-900 hover:bg-red-700 hover:text-white p-3 rounded-md text-gray-700">
                            <i class="ri-logout-box-line text-xl"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 p-10">
                <h1 class="text-4xl font-bold text-gray-800">@yield('title')</h1>
                <hr class="my-5 border-t-4 border-yellow-400">
                @yield('content')
            </div>
        </div>
    </body>
</html>

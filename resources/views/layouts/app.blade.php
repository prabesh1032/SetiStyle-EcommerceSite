<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"/>
    </head>
    <body class="font-sans antialiased">
        @include('layouts.alert')
        <div class ="flex">
            <div class="w-56 h-screen sticky top-0 bg-cyan-200 shadow">
                <img src="https://img.freepik.com/premium-vector/lion-logo-design-vector-template-premium-vector_384468-542.jpg" alt=""
                class="w-8/12 mx-auto mt-5 bg-white p-2 rounded-lg shadow-lg" >
                <div class="mt-5">
                    <a href="{{route('dashboard')}}" class="block p-3 text-gray-700
                    hover:bg-yellow-300">DashBoard</a>
                    <a href="{{route('categories.index')}}" class="block p-3 text-gray-700
                    hover:bg-yellow-300">Category</a>
                    <a href="{{route('products.index')}}" class="block p-3 text-gray-700
                    hover:bg-yellow-300">Product</a>
                    <a href="{{route('brand.index')}}" class="block p-3 text-gray-700
                    hover:bg-yellow-300">Brand</a>
                    <a href="" class="block p-3 text-gray-700
                    hover:bg-yellow-300">Orders</a>
                    <a href="" class="block p-3 text-gray-700
                    hover:bg-yellow-300">Users</a>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class ="block w-full p-3 text gray-700
                        hover:bg-red-700 text-left">logout</button>
                    </form>
                </div>
        </div>
        <div class="p-4 flex-1">
            <h1 class="text-6xl front-bold">@yield('title')</h1>
            <hr class="h-1 bg-yellow-400">
            @yield('content')
        </div>
     </div>
    </body>
</html>

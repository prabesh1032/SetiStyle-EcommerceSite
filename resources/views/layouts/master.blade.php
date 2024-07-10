<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - My Website</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">
    <nav class="flex justify-between items-center px-20 py-5 bg-white shadow-md sticky top-0 z-10">
        <div>
            <img src="{{ asset('images.jpg') }}" alt="Logo" class="w-12" >
        </div>
        <div>

            <a href="{{ route('home') }}" class="p-2 hover:text-blue-500">Home</a>
            <a href="{{ route('about') }}" class="p-2 hover:text-blue-500">About</a>
            <a href="{{ route('contact') }}" class="p-2 hover:text-blue-500">Contact</a>
            <a href="/login" class="p-2 hover:text-blue-500">Login</a>
        </div>
    </nav>

    <div class="container mx-auto py-10">
        @yield('content')
    </div>

    <footer class="bg-lime-200">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-10 px-10 py-10">
            <div>
                <h2 class="text-2xl font-bold mb-4">LOGO</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas quae sequi a dignissimos dolorum excepturi ut, quaerat qui in soluta officiis perspiciatis, quos inventore necessitatibus sed. Ad iste cupiditate rerum!</p>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">Quick Links</h2>
                <ul>
                    <li><a href="{{ route('home') }}" class="p-2 block hover:text-blue-500">Home</a></li>
                    <li><a href="{{ route('about') }}" class="p-2 block hover:text-blue-500">About</a></li>
                    <li><a href="{{ route('contact') }}" class="p-2 block hover:text-blue-500">Contact</a></li>
                    <li><a href="/login" class="p-2 block hover:text-blue-500">Login</a></li>
                </ul>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">Contact Us</h2>
                <p>Email: <a href="mailto:test@gmail.com" class="hover:text-blue-500">test@gmail.com</a></p>
                <p>Phone: <a href="tel:+9742538007" class="hover:text-blue-500">9812965110</a></p>
                <p>Address: <br>
                    123, Chitwan <br>
                    Nepal
                </p>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">Social Links</h2>
                <ul>
                    <li><a href="#" class="p-2 block hover:text-blue-500">Facebook</a></li>
                    <li><a href="#" class="p-2 block hover:text-blue-500">Twitter</a></li>
                    <li><a href="#" class="p-2 block hover:text-blue-500">Instagram</a></li>
                    <li><a href="#" class="p-2 block hover:text-blue-500">LinkedIn</a></li>
                </ul>
            </div>
        </div>
        <div class="bg-blue-500 text-white text-center py-5">
            <p>&copy; 2024 All rights reserved</p>
        </div>
    </footer>
</body>

</html>

@extends('layouts.master')

@section('content')

<!-- Hero Section with Image and Title -->
<header class="relative h-screen w-full bg-cover bg-center" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('chillshop.png') }}'); background-attachment: fixed;will-change: transform;">
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4 animate-bounce">
            Welcome to <span class="text-cyan-400 ">ChillShop</span>
        </h1>
        <p class="text-xl md:text-2xl text-gray-300 mb-6">
            Your one-stop shop for trendy clothes and accessories.
        </p>
        <a href="#" class="px-8 py-4 bg-yellow-400 text-black font-bold rounded-full hover:bg-yellow-600 transition duration-300">
            Start Shopping
        </a>
    </div>
</header>

<h1 class="text-blue-800 text-4xl text-center font-bold mt-10 hover:text-blue-500 transition-all duration-300 ease-in-out">
    Our Products
</h1>

<!-- Product Grid Section -->
<div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-10 md:px-20 sm:px-10 px-5 py-12">
    @forelse($products as $product)
    <div class="rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-2xl p-4 bg-white hover:bg-gray-100">
        <img src="{{ asset('images/' . $product->photopath) }}" alt="{{ $product->name }}" class="h-44 w-full object-cover rounded-t-lg transition-all duration-300 hover:scale-110">

        <h1 class="text-xl font-bold mt-2 text-blue-700 hover:text-blue-500 transition-all duration-300">{{ $product->name }}</h1>
        <p class="text-gray-500 text-sm">{{ $product->description }}</p>

        <div class="flex justify-between items-center mt-4">
            <h1 class="text-xl font-bold text-green-600">${{ number_format($product->price, 2) }}</h1>

            <a href="{{ route('viewproduct', $product->id) }}" class="bg-gradient-to-r from-red-600 via-yellow-400 to-gray-600 text-white px-3 py-1.5 rounded-lg hover:bg-gradient-to-l hover:from-yellow-400 hover:to-gray-600 transition-all duration-300 flex items-center space-x-2">
                <i class="ri-eye-line"></i> <span>View Product</span>
            </a>
        </div>
    </div>
    @empty
    <div class="col-span-4 text-center">
        <p class="text-gray-500 text-lg">No products available.</p>
    </div>
    @endforelse
</div>
<div class="text-center mb-12">
    <h2 class="text-4xl font-extrabold text-gray-900">Start Shopping Now</h2>
    <p class="text-lg text-gray-700 mt-2">Discover our premium collection and stylish designs.</p>
</div>
<!-- Decorative Image Section -->
<div class="grid grid-cols-2 gap-6 mt-10">
    <!-- Image 1 - Explore Fashion -->
    <div class="relative">
        <img src="{{ asset('e-commerce.png') }}" alt="Explore Fashion" class="w-full h-80 object-cover  rounded-lg shadow-lg">
        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-40 rounded-lg"></div>
        <div class="absolute bottom-5 left-5 text-white ">
            <h2 class="text-4xl font-bold mb-2 transform transition duration-300 ease-in-out hover:scale-105 hover:text-yellow-400">Explore Fashion</h2>
            <p class="text-lg transform transition duration-300 ease-in-out hover:scale-105 hover:text-yellow-400">Discover the latest styles in fashion for men and women.</p>
        </div>
    </div>

    <!-- Image 2 - Stylish Accessories -->
    <div class="relative">
        <img src="{{ asset('assoceries.png') }}" alt="Stylish Accessories" class="w-full h-80 object-cover rounded-lg shadow-lg">
        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-40 rounded-lg"></div>
        <div class="absolute bottom-5 left-5 text-white">
            <h2 class="text-4xl font-bold mb-2 transform transition duration-300 ease-in-out hover:scale-105 hover:text-yellow-400">Stylish Accessories</h2>
            <p class="text-lg transform transition duration-300 ease-in-out hover:scale-105 hover:text-yellow-400">Complete your look with our collection of premium accessories.</p>
        </div>
    </div>
</div>

<!-- Featured Categories Section -->
<div class="text-center mt-12">
    <h2 class="text-5xl font-bold text-gray-800">Featured Categories</h2>
    <div class="grid lg:grid-cols-5 sm:grid-cols-2 grid-cols-1 gap-10 md:px-20 sm:px-10 px-5 py-12 mt-6">
        @php
            $categories = App\Models\Category::orderBy('priority')->get();
        @endphp
        @foreach($categories as $category)
            <div class="text-center">
                <a href="{{ route('categoryproduct', $category->id) }}" class="hover:underline">
                    @switch($category->name)
                        @case('Menswear')
                            <i class="ri-shirt-line text-5xl text-blue-600 mb-4"></i>
                            @break
                        @case('Womenswear')
                            <i class="ri-t-shirt-line text-5xl text-blue-600 mb-4"></i>
                            @break
                        @case('Accessories')
                            <i class="ri-glasses-2-line text-5xl text-blue-600 mb-4"></i>
                            @break
                        @case('Footwear')
                            <i class="ri-footprint-line text-5xl text-blue-600 mb-4"></i>
                            @break
                        @default
                            <i class="ri-store-line text-5xl text-blue-600 mb-4"></i>
                    @endswitch
                    <h3 class="text-xl font-semibold">{{ $category->name }}</h3>
                </a>
            </div>
        @endforeach
    </div>
</div>


<!-- Testimonials Section -->
<div class="bg-gray-100 py-12 mt-16">
    <h2 class="text-3xl font-bold text-center text-blue-800">What Our Customers Say</h2>
    <div class="grid lg:grid-cols-3 sm:grid-cols-1 grid-cols-1 gap-10 mt-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-gray-600 mb-4">"I love ChillShop! The products are great quality, and the customer service is top-notch!"</p>
            <h3 class="font-bold text-lg text-blue-600">John Doe</h3>
            <p class="text-gray-500">Verified Buyer</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-gray-600 mb-4">"My shopping experience was amazing. Fast shipping and stylish clothing!"</p>
            <h3 class="font-bold text-lg text-blue-600">Jane Smith</h3>
            <p class="text-gray-500">Verified Buyer</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-gray-600 mb-4">"ChillShop has a fantastic collection of accessories. Highly recommend!"</p>
            <h3 class="font-bold text-lg text-blue-600">Mike Johnson</h3>
            <p class="text-gray-500">Verified Buyer</p>
        </div>
    </div>
</div>
@endsection

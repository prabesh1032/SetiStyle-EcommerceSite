@extends('layouts.master')

@section('content')

<!-- Hero Section with Image and Title -->
<header class="relative h-screen w-full bg-cover bg-center" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('chillshop.png') }}'); background-attachment: fixed;will-change: transform;">
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4 animate-bounce">
            Welcome to <span class="text-cyan-400 ">SetiStyle</span>
        </h1>
        <p class="text-xl md:text-2xl text-gray-300 mb-6">
            Your one-stop shop for trendy clothes and accessories.
        </p>
        <a href="#products" class="px-8 py-4 bg-yellow-400 text-black font-bold rounded-full hover:bg-yellow-600 transition duration-300">
            Start Shopping
        </a>
    </div>
</header>
<h1 class="text-blue-800 text-4xl text-center font-bold mt-10 hover:text-blue-500 transition-all duration-300 ease-in-out" id="products">
    Our Products
</h1>

<!-- Product Grid Section -->
<div class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8 md:px-20 sm:px-10 px-5 py-12">
    @forelse($products as $product)
    <div class="group relative bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl border border-gray-100">
        <!-- Image Container with Overlay -->
        <div class="relative overflow-hidden">
            <img src="{{ asset('images/' . $product->photopath) }}" alt="{{ $product->name }}" class="h-48 w-full object-cover transition-all duration-700 group-hover:scale-110">

            <!-- Overlay gradient -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300"></div>

            <!-- Stock Badge -->
            <div class="absolute top-3 left-3">
                @if($product->stock > 0)
                    <div class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg flex items-center animate-pulse">
                        <i class="ri-check-line mr-1"></i>
                        {{ $product->stock }} in stock
                    </div>
                @else
                    <div class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg flex items-center">
                        <i class="ri-close-line mr-1"></i>
                        Out of stock
                    </div>
                @endif
            </div>

            <!-- Quick View Button -->
            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                <a href="{{ route('viewproduct', $product->id) }}" class="bg-white text-gray-800 px-6 py-3 rounded-full font-semibold shadow-lg transform -translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:bg-gray-100 flex items-center space-x-2">
                    <i class="ri-eye-line"></i>
                    <span>Quick View</span>
                </a>
            </div>
        </div>

        <!-- Card Content -->
        <div class="p-6">
            <!-- Product Name -->
            <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-1 group-hover:text-blue-600 transition-colors duration-300">
                {{ $product->name }}
            </h3>

            <!-- Description -->
            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $product->description }}</p>

            <!-- Price and Action -->
            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                    <span class="text-2xl font-bold text-green-600 flex items-center">
                        Rs {{ number_format($product->price, 0) }}
                    </span>
                    <span class="text-xs text-gray-500">Best Price</span>
                </div>

                <a href="{{ route('viewproduct', $product->id) }}" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-4 py-2 rounded-xl font-semibold shadow-lg hover:from-blue-600 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 flex items-center space-x-1">
                    <i class="ri-shopping-cart-line"></i>
                    <span>Shop</span>
                </a>
            </div>
        </div>

        <!-- Bottom Gradient Border -->
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
    </div>
    @empty
    <div class="col-span-4 text-center py-12">
        <div class="max-w-md mx-auto">
            <i class="ri-shopping-bag-line text-6xl text-gray-400 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">No products available</h3>
            <p class="text-gray-500">Check back soon for amazing deals!</p>
        </div>
    </div>
    @endforelse
</div>


<!-- Featured Categories Section -->
<div class="bg-gradient-to-r from-gray-50 to-gray-100 py-20">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-5xl font-bold text-gray-800 mb-4">Shop by Category</h2>
            <p class="text-xl text-gray-600">Find exactly what you're looking for</p>
        </div>

        <div class="grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8">
            @php
                $categories = App\Models\Category::orderBy('priority')->get();

                // Array of 15 different icons with their gradient colors
                $iconData = [
                    ['icon' => 'ri-shirt-line', 'gradient' => 'from-blue-500 to-cyan-500'],
                    ['icon' => 'ri-t-shirt-line', 'gradient' => 'from-pink-500 to-rose-500'],
                    ['icon' => 'ri-glasses-2-line', 'gradient' => 'from-purple-500 to-indigo-500'],
                    ['icon' => 'ri-footprint-line', 'gradient' => 'from-green-500 to-emerald-500'],
                    ['icon' => 'ri-handbag-line', 'gradient' => 'from-orange-500 to-red-500'],
                    ['icon' => 'ri-watch-line', 'gradient' => 'from-teal-500 to-blue-500'],
                    ['icon' => 'ri-star-line', 'gradient' => 'from-yellow-500 to-orange-500'],
                    ['icon' => 'ri-heart-line', 'gradient' => 'from-rose-500 to-pink-500'],
                    ['icon' => 'ri-gift-line', 'gradient' => 'from-violet-500 to-purple-500'],
                    ['icon' => 'ri-diamond-line', 'gradient' => 'from-cyan-500 to-teal-500'],
                    ['icon' => 'ri-palette-line', 'gradient' => 'from-indigo-500 to-blue-500'],
                    ['icon' => 'ri-magic-line', 'gradient' => 'from-fuchsia-500 to-pink-500'],
                    ['icon' => 'ri-flashlight-line', 'gradient' => 'from-amber-500 to-yellow-500'],
                    ['icon' => 'ri-crown-line', 'gradient' => 'from-emerald-500 to-green-500'],
                    ['icon' => 'ri-trophy-line', 'gradient' => 'from-red-500 to-orange-500']
                ];

                // Shuffle the array to get random assignment
                shuffle($iconData);
            @endphp
            @foreach($categories as $index => $category)
                @php
                    // Get icon data for this category (cycle through if more categories than icons)
                    $currentIcon = $iconData[$index % count($iconData)];
                @endphp
                <div class="group text-center">
                    <a href="{{ route('categoryproduct', $category->id) }}" class="block">
                        <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 group-hover:bg-gradient-to-br group-hover:from-blue-50 group-hover:to-purple-50">
                            <div class="mb-6">
                                <div class="bg-gradient-to-r {{ $currentIcon['gradient'] }} w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                    <i class="{{ $currentIcon['icon'] }} text-3xl text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors duration-300">{{ $category->name }}</h3>
                            <p class="text-gray-600 text-sm mt-2">Explore our collection</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Stats Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-purple-700 text-white">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-8 text-center">
            <div class="group">
                <div class="mb-4">
                    <i class="ri-shopping-bag-3-line text-5xl mb-4 group-hover:scale-110 transition-transform duration-300"></i>
                    <h3 class="text-4xl font-bold mb-2" data-counter="1000">1000+</h3>
                    <p class="text-xl opacity-90">Products Sold</p>
                </div>
            </div>

            <div class="group">
                <div class="mb-4">
                    <i class="ri-user-heart-line text-5xl mb-4 group-hover:scale-110 transition-transform duration-300"></i>
                    <h3 class="text-4xl font-bold mb-2" data-counter="500">500+</h3>
                    <p class="text-xl opacity-90">Happy Customers</p>
                </div>
            </div>

            <div class="group">
                <div class="mb-4">
                    <i class="ri-star-line text-5xl mb-4 group-hover:scale-110 transition-transform duration-300"></i>
                    <h3 class="text-4xl font-bold mb-2" data-counter="98">98%</h3>
                    <p class="text-xl opacity-90">Satisfaction Rate</p>
                </div>
            </div>

            <div class="group">
                <div class="mb-4">
                    <i class="ri-award-line text-5xl mb-4 group-hover:scale-110 transition-transform duration-300"></i>
                    <h3 class="text-4xl font-bold mb-2" data-counter="5">5+</h3>
                    <p class="text-xl opacity-90">Years Experience</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Why Choose SetiStyle?</h2>
            <p class="text-xl text-gray-600">Experience shopping like never before</p>
        </div>

        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-8">
            <div class="text-center group">
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="ri-truck-line text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Free Delivery</h3>
                <p class="text-gray-600">Fast & free shipping on orders above Rs 1000</p>
            </div>

            <div class="text-center group">
                <div class="bg-gradient-to-r from-green-500 to-emerald-600 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="ri-shield-check-line text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Secure Payment</h3>
                <p class="text-gray-600">Your payments are safe and secure</p>
            </div>

            <div class="text-center group">
                <div class="bg-gradient-to-r from-pink-500 to-rose-600 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="ri-refresh-line text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Easy Returns</h3>
                <p class="text-gray-600">30-day hassle-free return policy</p>
            </div>

            <div class="text-center group">
                <div class="bg-gradient-to-r from-yellow-500 to-orange-600 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="ri-customer-service-line text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">24/7 Support</h3>
                <p class="text-gray-600">Always here to help you</p>
            </div>
        </div>
    </div>
</section>
@endsection

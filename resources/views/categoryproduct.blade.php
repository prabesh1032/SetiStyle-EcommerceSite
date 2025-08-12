@extends('layouts.master')

@section('content')
<h1 class="text-gray-900 text-5xl text-center font-extrabold mt-10 mb-8">{{ $category->name }} Products</h1>

<!-- Product Grid -->
<div class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8 md:px-20 sm:px-10 px-5 py-12">
    @foreach($products as $product)
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
    @endforeach
</div>
@endsection

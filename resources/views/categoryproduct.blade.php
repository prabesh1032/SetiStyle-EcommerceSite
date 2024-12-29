@extends('layouts.master')

@section('content')
<h1 class="text-gray-900 text-5xl text-center font-extrabold mt-10 mb-8">{{ $category->name }} Products</h1>

<!-- Product Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 px-5 md:px-20 py-12">
    @foreach($products as $product)
    <div class="rounded-lg shadow-lg hover:shadow-xl p-6 bg-white transform transition-all duration-300 ease-in-out hover:scale-105">
        <img src="{{ asset('images/'.$product->photopath) }}" alt="{{ $product->name }}" class="h-44 w-full object-cover rounded-lg mb-4">

        <h1 class="text-xl font-bold text-gray-800 hover:text-blue-600 transition duration-200">{{ $product->name }}</h1>
        <p class="text-gray-500 mt-2 text-sm">{{ $product->description }}</p>

        <div class="flex justify-between items-center mt-4">
            <h1 class="text-xl font-bold text-gray-900">{{ number_format($product->price, 2) }}</h1>
            <a href="{{ route('viewproduct', $product->id) }}" class="bg-blue-800 text-white px-3 py-2 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-400 flex items-center">
                <i class="ri-eye-line mr-2"></i> View Product
            </a>
        </div>
    </div>
    @endforeach
</div>

<div class="text-center mb-12">
    <h2 class="text-4xl font-extrabold text-gray-900">Start Shopping Now</h2>
    <p class="text-lg text-gray-600 mt-2">Discover our premium collection and stylish designs.</p>
</div>

<!-- Featured Images Section -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10 px-5 md:px-20 pb-12 ">
    <!-- Image 1 - Explore Fashion -->
    <div class="relative">
        <img src="{{ asset('e-commerce.png') }}" alt="Explore Fashion" class="w-full h-80 object-cover rounded-lg shadow-lg">
        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-40 rounded-lg"></div>
        <div class="absolute bottom-5 left-5 text-white">
            <h2 class="text-4xl font-bold mb-2 transform transition duration-300 ease-in-out hover:scale-105 hover:text-yellow-400">
                <i class="ri-t-shirt-2-line mr-2"></i> Explore Fashion
            </h2>
            <p class="text-lg transform transition duration-300 ease-in-out hover:scale-105 hover:text-yellow-400">
                Discover the latest styles in fashion for men and women.
            </p>
        </div>
    </div>

    <!-- Image 2 - Stylish Accessories -->
    <div class="relative ">
        <img src="{{ asset('assoceries.png') }}" alt="Stylish Accessories" class="w-full h-80 object-cover rounded-lg shadow-lg">
        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-40 rounded-lg"></div>
        <div class="absolute bottom-5 left-5 text-white">
            <h2 class="text-4xl font-bold mb-2 transform transition duration-300 ease-in-out hover:scale-105 hover:text-yellow-400">
                <i class="ri-handbag-line mr-2"></i> Stylish Accessories
            </h2>
            <p class="text-lg transform transition duration-300 ease-in-out hover:scale-105 hover:text-yellow-400">
                Complete your look with our collection of premium accessories.
            </p>
        </div>
    </div>
</div>
@endsection

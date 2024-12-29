@extends('layouts.app')

@section('title') Products @endsection

@section('content')
<div class="text-right my-5">
    <a href="{{ route('products.create') }}" class="bg-blue-600 text-white py-3 px-6 rounded-md font-semibold shadow-lg hover:bg-blue-700 transition duration-300 transform hover:scale-105">
        <i class="ri-add-line text-xl mr-2"></i> <span class="text-lg">Add Product</span>
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
    @foreach($products as $product)
    <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105 max-w-xs mx-auto">
        <div class="text-center">
            <!-- Product Image -->
            <img src="{{ asset('images/' . $product->photopath) }}" alt="{{ $product->name }}" class="w-full h-32 object-cover rounded-lg mb-4">

            <!-- Product Details -->
            <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $product->name }}</h2>

            <!-- Price with Icon -->
            <div class="flex items-center justify-center space-x-2 mb-2">
                <i class="ri-price-tag-3-line text-2xl text-green-600"></i>
                <p class="text-md text-gray-600">Price: <span class="font-bold text-green-600">${{ $product->price }}</span></p>
            </div>

            <!-- Stock with Icon -->
            <div class="flex items-center justify-center space-x-2 mb-2">
                <i class="ri-archive-line text-2xl text-blue-500"></i>
                <p class="text-sm text-gray-500">Stock: <span class="font-semibold text-blue-500">{{ $product->stock }}</span></p>
            </div>

            <!-- Description with Icon -->
            <!-- <div class="flex items-center justify-center space-x-2 mb-2">
                <i class="ri-file-text-line text-2xl text-gray-500"></i>
                <p class="text-sm text-gray-600">{{ $product->description }}</p>
            </div> -->

            <!-- Category with Icon -->
            <div class="flex items-center justify-center space-x-2 mb-2">
                <i class="ri-archive-box-line text-2xl text-orange-600"></i>
                <p class="text-sm text-gray-600">Category: <span class="text-orange-600">{{ $product->category ? $product->category->name : 'No Category' }}</span></p>
            </div>

            <!-- Brand with Icon -->
            <div class="flex items-center justify-center space-x-2 mb-4">
                <i class="ri-plant-line text-2xl text-teal-600"></i>
                <p class="text-sm text-gray-600">Brand: <span class="text-teal-600">{{ $product->brand ? $product->brand->name : 'No Brand' }}</span></p>
            </div>

            <!-- Action Buttons with Hover Effects -->
            <div class="flex justify-center space-x-4">
                <a href="{{ route('products.edit', $product->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition duration-300 flex items-center space-x-2 hover:scale-105">
                    <i class="ri-pencil-line text-lg"></i>
                    <span class="text-lg">Edit</span>
                </a>
                <a href="{{ route('products.destroy', $product->id) }}" class="bg-red-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-700 transition duration-300 flex items-center space-x-2 hover:scale-105" onclick="return confirm('Are you sure to delete?')">
                    <i class="ri-delete-bin-5-line text-lg"></i>
                    <span class="text-lg">Delete</span>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

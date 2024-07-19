@extends('layouts.master')
@section('content')
<h1 class="text-blue-800 text-4xl text-center font-bold mt-10">Our Products</h1>
<div class="grid grid-cols-4 gap-10 px-20 py-12">
    @forelse($products as $product)
    <div class="rounded-lg shadow-md p-4 bg-white">
        <img src="{{ asset('images/' . $product->photopath) }}" alt="{{ $product->name }}" class="h-44 w-full object-cover rounded-t-lg">
        <h1 class="text-xl font-bold mt-2">{{ $product->name }}</h1>
        <p class="text-gray-500">{{ $product->description }}</p>
        <div class="flex justify-between items-center mt-4">
            <h1 class="text-xl font-bold">${{ number_format($product->price, 2) }}</h1>
            <a href="{{ route('viewproduct', $product->id) }}" class="bg-gradient-to-r from-red-600 via-yellow-400 to-gray-600 text-white px-3 py-1.5 rounded-lg">View Product</a>
        </div>
    </div>
    @empty
    <div class="col-span-4 text-center">
        <p class="text-gray-500 text-lg">No products available.</p>
    </div>
    @endforelse
</div>

<div>
    <img src="" alt="This Is Home Page" class="h-88 w-full">
</div>
@endsection

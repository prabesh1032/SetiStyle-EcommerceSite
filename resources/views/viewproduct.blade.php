@extends('layouts.master')

@section('content')
<div class="container mx-auto p-8">
    <!-- Product Title -->
    <h1 class="text-5xl font-extrabold text-center text-gray-900 mb-4">{{ $product->name }}</h1>
    <p class="text-center text-lg text-gray-600">Discover the best deals on {{ $product->name }}!</p>

    <!-- Main Content -->
    <div class="flex flex-wrap mt-12 gap-y-8">
        <!-- Product Image Section -->
        <div class="w-full md:w-1/3 p-4 flex flex-col items-center bg-white shadow-md rounded-lg">
            <img src="{{ asset('images/' . $product->photopath) }}" alt="{{ $product->name }}" class="rounded-lg shadow-lg w-full h-64 object-cover transition-transform duration-500 hover:scale-105">
            <p class="mt-4 text-gray-600 text-center">In stock: <span class="text-green-600 font-bold">{{ $product->stock }}</span></p>
        </div>

        <!-- Product Details Section -->
        <div class="w-full md:w-1/3 p-6 bg-white shadow-md rounded-lg">
            <div class="space-y-6">
                <p class="text-lg text-gray-700 flex items-center">
                    <i class="ri ri-money-dollar-circle-line text-green-500 text-xl mr-3"></i>
                    <span><strong>Price:</strong> Rs. {{ number_format($product->price, 2) }}</span>
                </p>
                <p class="text-lg text-gray-700 flex items-center">
                    <i class="ri ri-shipping-fill text-yellow-500 text-xl mr-3"></i>
                    <span>Free Delivery in 2-3 days</span>
                </p>
                <form method="POST" action="{{ route('cart.store') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <label for="quantity" class="block text-gray-700 font-semibold mb-2">Quantity:</label>
                    <div class="flex items-center mb-4">
                        <button type="button" class="py-2 px-4 bg-blue-600 text-white text-xl cursor-pointer rounded-l-lg" onclick="decreaseqty()">-</button>
                        <input type="number" id="quantity"  name="quantity" class="w-16 text-center border border-gray-300 rounded-none focus:outline-none"
                            min="1" max="{{ $product->stock }}" value="1">
                        <button type="button" class="py-2 px-4 bg-blue-600 text-white text-xl cursor-pointer rounded-r-lg" onclick="increaseqty()">+</button>
                    </div>
                    <button type="submit" class="block w-full bg-gradient-to-r from-red-500 to-yellow-500 text-white py-3 rounded-lg shadow-lg hover:from-red-600 hover:to-yellow-600 transition-all duration-300 transform hover:scale-105">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>

        <!-- Sidebar Section -->
        <div class="w-full md:w-1/3 p-4 flex flex-col bg-white shadow-md rounded-lg">
            <div class="space-y-6">
                <a href="#" class="block p-6 bg-blue-50 border-l-4 border-blue-500 text-blue-700 hover:bg-blue-200 transition-all duration-300 rounded-lg shadow-md">
                    <p class="font-bold text-xl">Why Choose This Product</p>
                    <p class="text-sm mt-1">See why this product stands out.</p>
                </a>
                <a href="#" class="block p-6 bg-green-50 border-l-4 border-green-500 text-green-700 hover:bg-green-200 transition-all duration-300 rounded-lg shadow-md">
                    <p class="font-bold text-xl">Top Deals</p>
                    <p class="text-sm mt-1">Explore similar products with amazing offers.</p>
                </a>
                <a href="#" class="block p-6 bg-yellow-50 border-l-4 border-yellow-500 text-yellow-700 hover:bg-yellow-200 transition-all duration-300 rounded-lg shadow-md">
                    <p class="font-bold text-xl">Customer Reviews</p>
                    <p class="text-sm mt-1">Read what others have to say.</p>
                </a>
            </div>
        </div>
    </div>

    <!-- Description Section -->
    <div class="mt-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Product Description</h2>
        <p class="text-gray-700">
            This high-quality product is designed to offer exceptional value and functionality. Crafted with precision and attention to detail, it promises long-lasting durability and superior performance. Whether you're looking for something for daily use or a special occasion, this product combines style, comfort, and practicality in one. Its sleek design and reliable features make it a must-have for anyone seeking both quality and affordability.
        </p>
    </div>

    <!-- Related Products Section -->
    <div class="mt-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Related Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedproducts as $relatedproduct)
                <div class="border border-gray-200 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:shadow-xl">
                    <a href="{{ route('viewproduct', $relatedproduct->id) }}">
                        <img src="{{ asset('images/' . $relatedproduct->photopath) }}" alt="{{ $relatedproduct->name }}" class="h-56 w-full object-cover transition-transform duration-300 hover:scale-105">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-gray-900">{{ $relatedproduct->name }}</h3>
                            <p class="text-gray-600 mt-2">Rs. {{ number_format($relatedproduct->price, 2) }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    // Increase quantity
    function increaseqty() {
        const quantityInput = document.getElementById('quantity');
        const maxStock = {{ $product->stock }};
        let quantity = parseInt(quantityInput.value);

        // Ensure the quantity is within bounds
        if (quantity < maxStock) {
            quantityInput.value = quantity + 1;
        }
    }

    // Decrease quantity
    function decreaseqty() {
        const quantityInput = document.getElementById('quantity');
        let quantity = parseInt(quantityInput.value);

        // Ensure the quantity doesn't go below 1
        if (quantity > 1) {
            quantityInput.value = quantity - 1;
        }
    }
</script>

@endsection

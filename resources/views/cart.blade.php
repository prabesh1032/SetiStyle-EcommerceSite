@extends('layouts.master')

@section('content')
<h1 class="text-blue-800 text-5xl text-center font-extrabold my-5">My Cart</h1>

<!-- Cart Items Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 px-4 sm:px-6 md:px-8 lg:px-20 mb-10">
    @foreach($carts as $cart)
    <div class="group bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg hover:shadow-2xl border border-gray-100 overflow-hidden transform transition-all duration-300 hover:-translate-y-1">
        <!-- Image Section -->
        <div class="relative overflow-hidden">
            <!-- Check if product exists and has photopath -->
            @if($cart->product && $cart->product->photopath)
            <img src="{{ asset('images/' . $cart->product->photopath) }}" alt="{{ $cart->product->name }}" class="w-full h-52 object-cover group-hover:scale-110 transition-transform duration-500">
            @else
            <img src="{{ asset('images/default-placeholder.png') }}" alt="Product Image" class="w-full h-52 object-cover group-hover:scale-110 transition-transform duration-500">
            @endif

            <!-- Stock Badge -->
            <div class="absolute top-4 right-4">
                @if($cart->product && $cart->product->stock > 0)
                    <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full font-semibold border border-green-200">
                        <i class="ri-check-line"></i> In Stock
                    </span>
                @else
                    <span class="bg-red-100 text-red-800 text-xs px-3 py-1 rounded-full font-semibold border border-red-200">
                        <i class="ri-close-line"></i> Out of Stock
                    </span>
                @endif
            </div>
        </div>

        <!-- Content Section -->
        <div class="p-6 space-y-4">
            <!-- Product Name -->
            <h1 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors duration-300 line-clamp-2">
                {{ $cart->product ? $cart->product->name : 'Product Unavailable' }}
            </h1>

            <!-- Product Details -->
            <div class="space-y-3">
                <!-- Price -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <i class="ri-money-dollar-circle-line text-green-500"></i>
                        <span class="text-sm text-gray-600">Unit Price:</span>
                    </div>
                    <span class="font-bold text-green-600">Rs {{ number_format($cart->product ? $cart->product->price : 0) }}</span>
                </div>

                <!-- Quantity -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <i class="ri-box-line text-blue-500"></i>
                        <span class="text-sm text-gray-600">Quantity:</span>
                    </div>
                    <span class="font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded-lg">{{ $cart->quantity }}</span>
                </div>

                <!-- Total Price -->
                <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                    <div class="flex items-center gap-2">
                        <i class="ri-calculator-line text-red-500"></i>
                        <span class="text-sm font-medium text-gray-700">Total:</span>
                    </div>
                    <span class="font-bold text-lg text-red-600">Rs {{ number_format(($cart->product ? $cart->product->price : 0) * $cart->quantity) }}</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-100">
                <!-- Remove Button -->
                <button onclick="showModal('{{ $cart->id }}')"
                        class="flex-1 bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2.5 rounded-xl hover:from-red-600 hover:to-red-700 shadow-lg hover:shadow-xl transition-all duration-300 font-medium flex items-center justify-center gap-2">
                    <i class="ri-delete-bin-line"></i>Remove
                </button>

                <!-- Order Now Button -->
                <a href="{{ route('checkout', $cart->id) }}"
                   class="flex-1 bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2.5 rounded-xl hover:from-green-600 hover:to-green-700 shadow-lg hover:shadow-xl transition-all duration-300 font-medium flex items-center justify-center gap-2 text-center">
                    <i class="ri-shopping-cart-line"></i>Order Now
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- Empty Cart Message -->
@if($carts->isEmpty())
    <div class="flex flex-col items-center justify-center py-16 px-4">
        <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-full p-8 mb-6">
            <i class="ri-shopping-cart-line text-6xl text-blue-400"></i>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-3">Your Cart is Empty</h2>
        <p class="text-gray-600 text-center mb-8 max-w-md">
            Looks like you haven't added anything to your cart yet. Start exploring our amazing products!
        </p>
        <a href="{{ route('home') }}"
           class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-3 rounded-xl hover:from-blue-700 hover:to-blue-800 shadow-lg hover:shadow-xl transition-all duration-300 font-medium flex items-center gap-2">
            <i class="ri-store-2-line"></i>
            Browse Products
        </a>
    </div>
@endif

<!-- Delete Modal -->
<div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden items-center justify-center z-50" id="deleteModal">
    <form action="{{ route('cart.destroy') }}" method="POST" class="bg-white p-6 rounded-lg shadow-2xl max-w-md">
        @csrf
        @method('DELETE')
        <input type="hidden" name="dataid" id="cartId">
        <h1 class="text-2xl font-bold text-center text-blue-700 mb-4">
            <i class="ri-error-warning-line text-yellow-500 mr-2"></i> Confirm Deletion
        </h1>
        <p class="text-gray-600 text-center mb-6">Are you sure you want to remove this item from your cart? This action cannot be undone.</p>
        <div class="flex justify-center gap-5">
            <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-400">
                <i class="ri-check-line mr-2"></i>Yes, Delete
            </button>
            <button type="button" onclick="hideModal()" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 focus:ring-2 focus:ring-gray-400">
                <i class="ri-close-line mr-2"></i>Cancel
            </button>
        </div>
    </form>
</div>

<script>
    // Hide modal
    function hideModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        document.getElementById('deleteModal').classList.remove('flex');
    }

    // Show modal and set cart id
    function showModal(id) {
        document.getElementById('cartId').value = id;
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
    }
</script>
@endsection

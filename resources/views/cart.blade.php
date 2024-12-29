@extends('layouts.master')

@section('content')
<h1 class="text-blue-800 text-5xl text-center font-extrabold my-5">My Cart</h1>

<!-- Cart Items Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 px-5 md:px-20">
    @foreach($carts as $cart)
    <div class="p-5 border shadow-lg rounded-lg bg-gradient-to-br from-gray-50 to-gray-100 hover:shadow-2xl hover:-translate-y-2 transform transition duration-300 ease-in-out">
        <!-- Check if product exists and has photopath -->
        @if($cart->product && $cart->product->photopath)
        <img src="{{ asset('images/' . $cart->product->photopath) }}" alt="Product Image" class="w-full h-44 object-cover rounded-lg mb-4 shadow-sm">
        @else
        <img src="{{ asset('images/default-placeholder.png') }}" alt="Product Image" class="w-full h-40 object-cover rounded-lg mb-4 shadow-sm">
        @endif

        <div class="flex flex-col gap-3">
            <!-- Product Name -->
            <h1 class="text-2xl font-bold text-blue-700">{{ $cart->product ? $cart->product->name : 'Product Unavailable' }}</h1>

            <!-- Price -->
            <p class="text-gray-600 flex items-center gap-2">
                <i class="ri-money-dollar-circle-line text-green-500"></i>
                <span class="font-semibold">${{ number_format($cart->product ? $cart->product->price : 0, 2) }}</span>
            </p>

            <!-- Quantity -->
            <p class="text-gray-600 flex items-center gap-2">
                <i class="ri-add-line text-blue-500"></i>
                <span>Quantity: <span class="font-semibold">{{ $cart->quantity }}</span></span>
            </p>

            <!-- Total Price -->
            <p class="text-gray-800 font-semibold flex items-center gap-2">
                <i class="ri-calculator-line text-red-500"></i>
                <span>Total: ${{ number_format(($cart->product ? $cart->product->price : 0) * $cart->quantity, 2) }}</span>
            </p>
        </div>

        <div class="flex justify-between mt-5">
            <!-- Remove Button -->
            <button onclick="showModal('{{ $cart->id }}')" class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-red-600 shadow-md transition">
                <i class="ri-delete-bin-line mr-2"></i>Remove
            </button>

            <!-- Order Now Button -->
            <a href="{{ route('checkout', $cart->id) }}" class="bg-green-500 text-white px-3 py-2 rounded-lg hover:bg-green-600 shadow-md transition">
                <i class="ri-shopping-cart-line mr-2"></i>Order Now
            </a>
        </div>
    </div>
    @endforeach
</div>
<!-- Empty Cart Message -->
@if($carts->isEmpty())
    <div class="text-center mt-8">
        <p class="text-xl font-semibold text-gray-700">Your cart is empty. Start shopping now!</p>
        <a href="{{ route('shop.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-400">
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

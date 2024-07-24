@extends('layouts.master')
@section('content')
    <h2 class="text-4xl font-bold text-gray-800 text-center py-10">Checkout</h2>
    <form action="{{route('order.store')}}" method="post">
        @csrf
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 px-5 md:px-20 py-10">
        <div class="col-span-2 flex flex-col md:flex-row gap-5 shadow-lg border rounded-lg bg-white p-5">
            <img src="{{ asset('images/'.$cart->product->photopath) }}" alt="checkout" class="w-full md:w-1/3 h-48 object-cover rounded-lg">
            <div class="flex-1">
                <h2 class="text-2xl font-semibold text-gray-800">{{ $cart->product->name }}</h2>
                <p class="text-lg text-gray-600 mt-2">Price: ${{ number_format($cart->product->price, 2) }}</p>
                <p class="text-lg text-gray-600 mt-2">Quantity: {{ $cart->quantity }}</p>
                <p class="text-lg text-gray-800 font-semibold mt-2">Total: ${{ number_format($cart->product->price * $cart->quantity, 2) }}</p>
                <input type="hidden" name="product_id" value="{{$cart->product_id}}">
                <input type="hidden" name="quantity" value="{{$cart->quantity}}">
                <input type="hidden" name="price" value="{{$cart->product->price}}">
                <input type="hidden" name="cart_id" value="{{$cart->id}}">
            </div>
        </div>
        <div class="col-span-2 shadow-lg border rounded-lg bg-white p-5">
            <h3 class="text-2xl font-semibold text-gray-800 mb-5">Shipping Information</h3>
            <input type="text" placeholder="Name" name="name" class="w-full border rounded-lg p-3 mb-3 "
            value="{{auth()->user()->name}}">
            <input type="text" placeholder="Address" name="address" class="w-full border rounded-lg p-3 mb-3">
            <input type="text" placeholder="Phone" name="phone"class="w-full border rounded-lg p-3 mb-3">
        </div>
        <div class="col-span-1 shadow-lg border rounded-lg bg-white p-5">
            <h3 class="text-2xl font-semibold text-gray-800 mb-5">Order Summary</h3>
            <h2 class="text-xl font-semibold text-gray-800">Total: ${{ number_format($cart->product->price * $cart->quantity, 2) }}</h2>
            <select name="payment_method" class="w-full border rounded-lg p-3 mt-5">
                <option value="COD">Cash On Delivery</option>
                <option value="Esewa">Esewa</option>
            </select>
            <button class="bg-blue-500 text-white w-full p-3 rounded-lg mt-5 hover:bg-blue-600 transition duration-300">Checkout</button>
        </div>
    </div>
</form>
@endsection

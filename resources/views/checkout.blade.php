@extends('layouts.master')

@section('content')
    <h2 class="text-4xl font-bold text-gray-800 text-center py-10">Checkout</h2>

    <!-- Checkout Form -->
    <form action="{{ route('order.store') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 px-5 md:px-20 py-10">

            <!-- Product Information -->
            <div class="col-span-1 lg:col-span-1 flex flex-col bg-white p-6 rounded-lg shadow-lg">
                <img src="{{ asset('images/'.$cart->product->photopath) }}" alt="Product Image" class="w-full h-48 object-cover rounded-lg mb-5">

                <div>
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $cart->product->name }}</h2>
                    <p class="text-lg text-gray-600 mt-2">Price: ${{ number_format($cart->product->price, 2) }}</p>
                    <p class="text-lg text-gray-600 mt-2">Quantity: {{ $cart->quantity }}</p>
                    <p class="text-lg text-gray-800 font-semibold mt-2">Total: ${{ number_format($cart->product->price * $cart->quantity, 2) }}</p>
                </div>

                <!-- Hidden Fields -->
                <input type="hidden" name="product_id" value="{{ $cart->product_id }}">
                <input type="hidden" name="quantity" value="{{ $cart->quantity }}">
                <input type="hidden" name="price" value="{{ $cart->product->price }}">
                <input type="hidden" name="cart_id" value="{{ $cart->id }}">
            </div>

            <!-- Shipping Information -->
            <div class="col-span-1 lg:col-span-1 bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold text-gray-800 mb-5">Shipping Information</h3>

                <!-- Name -->
                <input type="text" name="name" placeholder="Full Name" class="w-full border rounded-lg p-4 mb-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ auth()->user()->name }}" required>

                <!-- Address -->
                <input type="text" name="address" placeholder="Address" class="w-full border rounded-lg p-4 mb-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>

                <!-- Phone -->
                <input type="text" name="phone" placeholder="Phone Number" class="w-full border rounded-lg p-4 mb-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Order Summary and Payment -->
            <div class="col-span-1 lg:col-span-1 bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold text-gray-800 mb-5">Order Summary</h3>

                <div class="mb-5">
                    <h2 class="text-xl font-semibold text-gray-800">Total: ${{ number_format($cart->product->price * $cart->quantity, 2) }}</h2>
                </div>

                <select name="payment_method" class="w-full border rounded-lg p-4 mb-5 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="COD">Cash On Delivery</option>
                </select>

                <!-- Checkout Button -->
                <button type="submit" class="bg-blue-500 text-white w-full p-4 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out">Checkout</button>
            </div>
        </div>
    </form>

    <!-- eSewa Payment Form -->
    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST" class="mt-10">
        <input type="hidden" id="amount" name="amount" value="100" required>
        <input type="hidden" id="tax_amount" name="tax_amount" value="0" required>
        <input type="hidden" id="total_amount" name="total_amount" value="110" required>
        <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="241028" required>
        <input type="hidden" id="product_code" name="product_code" value="EPAYTEST" required>
        <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
        <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
        <input type="hidden" id="success_url" name="success_url" value="{{ route('order.storeEsewa', $cart->id) }}" required>
        <input type="hidden" id="failure_url" name="failure_url" value="{{ route('mycarts') }}" required>
        <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
        <input type="hidden" id="signature" name="signature" value="" required>

        <!-- Payment Button -->
        <input value="Pay with eSewa" type="submit" class="bg-green-500 text-white w-full p-4 rounded-lg cursor-pointer mt-5 hover:bg-green-600 transition duration-300 ease-in-out">
    </form>

    @php
        $total_amount = $cart->product->price * $cart->quantity;
        $transaction_uuid = time();
        $msg = "total_amount=$total_amount,transaction_uuid=$transaction_uuid,product_code=EPAYTEST";
        $secret = "8gBm/:&EnhH.1/q";
        $s = hash_hmac('sha256', $msg, $secret, true);
        $signature = base64_encode($s);
    @endphp

    <script>
        document.getElementById('amount').value = "{{ $total_amount }}";
        document.getElementById('total_amount').value = "{{ $total_amount }}";
        document.getElementById('transaction_uuid').value = "{{ $transaction_uuid }}";
        document.getElementById('signature').value = "{{ $signature }}";
    </script>

@endsection

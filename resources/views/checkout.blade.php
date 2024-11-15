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
            </select>
            <button class="bg-blue-500 text-white w-full p-3 rounded-lg mt-5 hover:bg-blue-600 transition duration-300">Checkout</button>
        </div>
    </div>
</form>
<form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
 <input type="text" id="amount" name="amount" value="100" required>
 <input type="text" id="tax_amount" name="tax_amount" value ="0" required>
 <input type="text" id="total_amount" name="total_amount" value="110" required>
 <input type="text" id="transaction_uuid" name="transaction_uuid" value="241028" required>
 <input type="text" id="product_code" name="product_code" value ="EPAYTEST" required>
 <input type="text" id="product_service_charge" name="product_service_charge" value="0" required>
 <input type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
 <input type="text" id="success_url" name="success_url" value="https://esewa.com.np" required>
 <input type="text" id="failure_url" name="failure_url" value="https://google.com" required>
 <input type="text" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
 <input type="text" id="signature" name="signature" value="" required>
 <input value="Submit" type="submit">
 </form>
 @php
 $total_amount=$cart->product->price*$cart->quantity;
 $transaction_uuid=time();
 $msg="total_amount=$total_amount,transaction_uuid=$transaction_uuid,product_code=EPAYTEST";
 $secret="8gBm/:&EnhH.1/q";
 $s = hash_hmac('sha256', $msg, $secret, true);
 $signature=base64_encode($s);
@endphp
 <script>
    document.getElementById('amount').value="{{$total_amount}}";
    document.getElementById('total_amount').value="{{$total_amount}}";
    document.getElementById('transaction_uuid').value="{{$transaction_uuid}}";
    document.getElementById('signature').value="{{$signature}}";
</script>

@endsection

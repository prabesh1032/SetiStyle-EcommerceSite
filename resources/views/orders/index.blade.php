@extends('layouts.app')
@section('title') Orders @endsection
@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center mb-10">Orders</h1>
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr>
                <th class="border p-2 bg-green-700 text-white">Order Time</th>
                <th class="border p-2 bg-green-700 text-white">Product Image</th>
                <th class="border p-2 bg-green-700 text-white">Product Name</th>
                <th class="border p-2 bg-green-700 text-white">Customer Name</th>
                <th class="border p-2 bg-green-700 text-white">Phone</th>
                <th class="border p-2 bg-green-700 text-white">Address</th>
                <th class="border p-2 bg-green-700 text-white">Quantity</th>
                <th class="border p-2 bg-green-700 text-white">Price</th>
                <th class="border p-2 bg-green-700 text-white">Total</th>
                <th class="border p-2 bg-green-700 text-white">Payment Method</th>
                <th class="border p-2 bg-green-700 text-white">Status</th>
                <th class="border p-2 bg-green-700 text-white">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order )
            <tr class="bg-gray-50 hover:bg-gray-100">
                <td class="border p-2 text-center">{{ $order->created_at }}</td>
                <td class="border p-2 text-center">
                    <img src="{{ asset('images/' . $order->product->photopath) }}" alt="Product Image" class="h-28 mx-auto rounded-lg">
                </td>
                <td class="border p-2 text-center">{{ $order->product->name }}</td>
                <td class="border p-2 text-center">{{ $order->name }}</td>
                <td class="border p-2 text-center">{{ $order->phone }}</td>
                <td class="border p-2 text-center">{{ $order->address }}</td>
                <td class="border p-2 text-center">{{ $order->quantity }}</td>
                <td class="border p-2 text-center">{{ number_format($order->price, 2) }}</td>
                <td class="border p-2 text-center">{{ number_format($order->quantity * $order->price, 2) }}</td>
                <td class="border p-2 text-center">{{ $order->payment_method }}</td>
                <td class="border p-2 text-center">{{ $order->status }}</td>
                <td class="border p-2 text-center">
                    <div class="grid gap-2">
                        <a href="{{ route('orders.status', [$order->id, 'Pending']) }}" class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700">Pending</a>
                        <a href="{{ route('orders.status', [$order->id, 'Processing']) }}" class="bg-green-600 text-white p-2 rounded-lg hover:bg-green-700">Processing</a>
                        <a href="{{ route('orders.status', [$order->id, 'Delivered']) }}" class="bg-orange-600 text-white p-2 rounded-lg hover:bg-orange-700">Delivered</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

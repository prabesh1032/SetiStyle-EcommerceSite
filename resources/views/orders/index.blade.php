@extends('layouts.app')

@section('title') Orders @endsection

@section('content')
<!-- Orders Table -->
<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="min-w-full divide-gray-200">
        <thead class="bg-teal-500 text-white p-5 font-bold border border-gray-300">
            <tr>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">S.N</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">Product</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">Customer</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">Phone</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">Quantity</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">Total Price</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">Payment Method</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">Status</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">Date</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y p-5 divide-gray-200">
            @forelse($orders as $order)
            <tr class="hover:bg-gray-50 transition-colors duration-150">
                <td class="p-1 whitespace-nowrap text-sm text-center text-gray-900 border-r border-gray-100">
                    {{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->iteration }}.
                </td>
                <td class="p-1 whitespace-nowrap text-center text-sm text-gray-800 border-r border-gray-100">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('images/' . $order->product->photopath) }}" alt="{{ $order->product->name }}" class="h-8 w-8 object-cover rounded-md mr-2">
                        <span class="truncate max-w-24">{{ $order->product->name }}</span>
                    </div>
                </td>
                <td class="p-1 whitespace-nowrap text-center text-sm text-gray-800 border-r border-gray-100">
                    <div>
                        <div class="font-medium">{{ $order->name }}</div>
                        <div class="text-xs text-gray-500 truncate max-w-32">{{ $order->address }}</div>
                    </div>
                </td>
                <td class="p-1 whitespace-nowrap text-center text-sm text-gray-800 border-r border-gray-100">
                    {{ $order->phone }}
                </td>
                <td class="p-1 whitespace-nowrap text-center text-sm text-gray-800 border-r border-gray-100">
                    {{ $order->quantity }}
                </td>
                <td class="p-1 whitespace-nowrap text-center text-sm text-gray-800 border-r border-gray-100">
                    <span class="font-semibold text-green-600">Rs. {{ number_format($order->quantity * $order->price, 0) }}</span>
                </td>
                <td class="p-1 whitespace-nowrap text-center text-sm text-gray-800 border-r border-gray-100">
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">{{ $order->payment_method }}</span>
                </td>
                <td class="p-1 whitespace-nowrap text-center text-sm text-gray-800 border-r border-gray-100">
                    @if($order->status == 'Pending')
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">{{ $order->status }}</span>
                    @elseif($order->status == 'Processing')
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">{{ $order->status }}</span>
                    @elseif($order->status == 'Delivered')
                        <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded-full text-xs font-medium">{{ $order->status }}</span>
                    @else
                        <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">{{ $order->status }}</span>
                    @endif
                </td>
                <td class="p-1 whitespace-nowrap text-center text-sm text-gray-800 border-r border-gray-100">
                    {{ $order->created_at->format('d M Y') }}
                </td>
                <td class="p-1 whitespace-nowrap text-sm font-medium text-center">
                    <div class="flex justify-center space-x-1">
                        <a href="{{ route('orders.status', [$order->id, 'Pending']) }}"
                           class="text-blue-600 hover:text-blue-900 transition-colors duration-200"
                           title="Mark as Pending">
                            <i class="ri-time-line text-lg"></i>
                        </a>
                        <a href="{{ route('orders.status', [$order->id, 'Processing']) }}"
                           class="text-green-600 hover:text-green-900 transition-colors duration-200"
                           title="Mark as Processing">
                            <i class="ri-refresh-line text-lg"></i>
                        </a>
                        <a href="{{ route('orders.status', [$order->id, 'Delivered']) }}"
                           class="text-orange-600 hover:text-orange-900 transition-colors duration-200"
                           title="Mark as Delivered">
                            <i class="ri-checkbox-circle-line text-lg"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="px-6 py-4 text-center">
                    <div class="bg-white rounded-lg p-8 text-center">
                        <i class="ri-shopping-cart-line text-5xl text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-medium text-gray-700">No orders found</h3>
                        <p class="text-gray-500 mt-2">
                            Orders will appear here when customers place them
                        </p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($orders->hasPages())
<div class="mt-4">
    {{ $orders->appends(request()->query())->links() }}
</div>
@endif
@endsection

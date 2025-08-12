@extends('layouts.app')

@section('title') Products @endsection

@section('content')
<div class="text-center sm:text-right mb-3">
    <a href="{{ route('products.create') }}"
       class="bg-blue-500 text-white py-2 px-4 rounded-full font-semibold hover:bg-blue-700 transition duration-300 transform hover:scale-110 inline-block">
        <i class="ri-add-line text-sm"></i> <span class="text-sm">Add Product</span>
    </a>
</div>

<!-- Products Table -->
<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="min-w-full divide-gray-200">
        <thead class="bg-teal-500 text-white p-5 font-bold border border-gray-300">
            <tr>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">S.N</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">Product Name</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">Price</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">Stock</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">Category</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">Picture</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y p-5 divide-gray-200">
            @forelse($products as $product)
            <tr class="hover:bg-gray-50 transition-colors duration-150">
                <td class="p-1 whitespace-nowrap text-sm text-center text-gray-900 border-r border-gray-100">
                    {{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}.
                </td>
                <td class="p-1 whitespace-nowrap text-center text-sm text-gray-800 border-r border-gray-100">
                    {{ $product->name }}
                </td>
                <td class="p-1 whitespace-nowrap text-center text-sm text-gray-800 border-r border-gray-100">
                    Rs. {{ number_format($product->price, 0) }}
                </td>
                <td class="p-1 whitespace-nowrap text-center text-sm text-gray-800 border-r border-gray-100">
                    {{ $product->stock }}
                </td>
                <td class="p-1 whitespace-nowrap text-center text-sm text-gray-800 border-r border-gray-100">
                    {{ $product->category->name ?? 'N/A' }}
                </td>
                <td class="p-1 whitespace-nowrap text-center text-sm text-gray-800 border-r border-gray-100">
                    <img src="{{ asset('images/'.$product->photopath) }}" alt="Product Image" class="h-10 w-10 object-cover rounded-md mx-auto">
                </td>
                <td class="p-1 whitespace-nowrap text-sm font-medium text-center">
                    <div class="flex justify-center space-x-2">
                        <a href="{{ route('products.edit', $product->id) }}"
                           class="text-blue-600 hover:text-blue-900 transition-colors duration-200"
                           title="Edit">
                            <i class="ri-pencil-line text-lg"></i>
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-600 hover:text-red-900 transition-colors duration-200"
                                    title="Delete">
                                <i class="ri-delete-bin-line text-lg"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-6 py-4 text-center">
                    <div class="bg-white rounded-lg p-8 text-center">
                        <i class="ri-shopping-bag-line text-5xl text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-medium text-gray-700">No products found</h3>
                        <p class="text-gray-500 mt-2">
                            Start by adding your first product
                        </p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($products->hasPages())
<div class="mt-4">
    {{ $products->appends(request()->query())->links() }}
</div>
@endif
@endsection

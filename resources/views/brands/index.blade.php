@extends('layouts.app')

@section('title') Brands @endsection

@section('content')
<div class="text-center sm:text-right mb-3">
    <a href="{{ route('brand.create') }}"
       class="bg-blue-500 text-white py-2 px-4 rounded-full font-semibold hover:bg-blue-700 transition duration-300 transform hover:scale-110 inline-block">
        <i class="ri-add-line text-sm"></i> <span class="text-sm">Add Brand</span>
    </a>
</div>

<!-- Brands Table -->
<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="min-w-full divide-gray-200">
        <thead class="bg-teal-500 text-white p-5 font-bold border border-gray-300">
            <tr>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">S.N</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider border-r border-teal-400">Brand Name</th>
                <th scope="col" class="p-2 text-center text-xs font-bold uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y p-5 divide-gray-200">
            @forelse($brands as $brand)
            <tr class="hover:bg-gray-50 transition-colors duration-150">
                <td class="p-1 whitespace-nowrap text-sm text-center text-gray-900 border-r border-gray-100">
                    {{ ($brands->currentPage() - 1) * $brands->perPage() + $loop->iteration }}.
                </td>
                <td class="p-1 whitespace-nowrap text-center text-sm text-gray-800 border-r border-gray-100">
                    {{ $brand->name }}
                </td>
                <td class="p-1 whitespace-nowrap text-sm font-medium text-center">
                    <div class="flex justify-center space-x-2">
                        <a href="{{ route('brand.edit', $brand->id) }}"
                           class="text-blue-600 hover:text-blue-900 transition-colors duration-200"
                           title="Edit">
                            <i class="ri-pencil-line text-lg"></i>
                        </a>
                        <form action="{{ route('brand.destroy', $brand->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this brand?');">
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
                <td colspan="3" class="px-6 py-4 text-center">
                    <div class="bg-white rounded-lg p-8 text-center">
                        <i class="ri-bookmark-line text-5xl text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-medium text-gray-700">No brands found</h3>
                        <p class="text-gray-500 mt-2">
                            Start by adding your first brand
                        </p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($brands->hasPages())
<div class="mt-4">
    {{ $brands->appends(request()->query())->links() }}
</div>
@endif
@endsection

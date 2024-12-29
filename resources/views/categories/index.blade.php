@extends('layouts.app')

@section('title') Categories @endsection

@section('content')
<div class="text-right my-5">
    <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white py-3 px-6 rounded-md font-semibold shadow-lg hover:bg-blue-700 transition duration-300 transform hover:scale-105">
        <i class="ri-add-line text-xl mr-2"></i> Add Category
    </a>
</div>

<table class="mt-5 w-full table-auto rounded-lg overflow-hidden shadow-md">
    <thead>
        <tr class="bg-gradient-to-r from-teal-500 to-cyan-400 text-white">
            <th class="border p-4 text-lg">S.N.</th>
            <th class="border p-4 text-lg">Category</th>
            <th class="border p-4 text-lg">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr class="text-center hover:bg-gray-50 transition duration-300">
            <td class="border p-4 text-lg">{{ $category->priority }}</td>
            <td class="border p-4 text-lg font-medium text-gray-700">{{ $category->name }}</td>
            <td class="border p-4">
                <a href="{{ route('categories.edit', $category->id) }}"
                   class="bg-yellow-500 text-white px-4 py-2 rounded-lg transition duration-300 transform hover:scale-105 hover:bg-yellow-600">
                    <i class="ri-pencil-line text-xl mr-2"></i> Edit
                </a>
                <a href="{{ route('categories.destroy', $category->id) }}"
                   class="bg-red-600 text-white px-4 py-2 rounded-lg ml-2 transition duration-300 transform hover:scale-105 hover:bg-red-700"
                   onclick="return confirm('Are you sure you want to delete this category?')">
                    <i class="ri-delete-bin-5-line text-xl mr-2"></i> Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

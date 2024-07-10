@extends('layouts.app')
@section('title')Categories
@endsection
@section('content')
<div class="text-right my-5">
    <a href="{{route('categories.create')}}" class="bg-red-700 text-white py-3 px-5 rounded-md front-bold">ADD CATEGORY</a>
</div>
<table class="mt-5 w-full">
    <thead>
        <tr>
            <th class="border p-2 bg-lime-300">S.N.</th>
            <th class="border p-2 bg-lime-300">Category</th>
            <th class="border p-2 bg-lime-300">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr class="text-center bg-yellow-100">
            <td class="border p-2">{{$category->priority}}</td>
            <td class="border p-2">{{$category->name}}</td>
            <td class="border p-2">
                <a href="{{route('categories.edit',$category->id)}} 
                "class="bg-indigo-700 text-whitr px-3 py-1.5 rounded-lg">Edit</a>
                <a href="{{route('categories.destroy',$category->id)}}" 
                class="bg-red-700 text-whitr px-3 py-1.5 rounded-lg" onclick= "return confirm('Are you sure to delete')">Delete</a>
        
        </tr>
        @endforeach
    </tbody>

</table>

@endsection
@extends('layouts.app')
@section('title')Brands
@endsection
@section('content')
<div class="text-right my-5">
    <a href="{{route('brand.create')}}" class="bg-red-700 text-white py-3 px-5 rounded-md front-bold">ADD BRAND</a>
</div>
<table class="mt-5 w-full">
    <thead>
        <tr>
            <th class="border p-2 bg-lime-300">S.N.</th>
            <th class="border p-2 bg-lime-300">Brand</th>
            <th class="border p-2 bg-lime-300">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($brands as $brand)
        <tr class="text-center bg-yellow-100">
            <td class="border p-2">{{$loop->iteration}}</td>
            <td class="border p-2">{{$brand->name}}</td>
            <td class="border p-2">
                <a href="{{route('brand.edit',$brand->id)}}
                "class="bg-indigo-700 text-whitr px-3 py-1.5 rounded-lg">Edit</a>
                <a href="{{route('brand.destroy',$brand->id)}}"
                class="bg-red-700 text-whitr px-3 py-1.5 rounded-lg"
                onclick= "return confirm('Are you sure to delete')">Delete</a>

        </tr>
        @endforeach
    </tbody>

</table>

@endsection

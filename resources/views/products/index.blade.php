 @extends('layouts.app')
@section('title')Products
@endsection
@section('content')
<div class="text-right my-5">
    <a href="{{route('products.create')}}" class="bg-red-700 text-white py-3 px-5 rounded-md front-bold">ADD PRODUCT</a>
</div>
<table class="mt-5 w-full">
    <thead>
        <tr>
            <th class="border p-2 bg-lime-300">S.N.</th>
            <th class="border p-2 bg-lime-300">Product Name</th>
            <th class="border p-2 bg-lime-300">Price</th>
            <th class="border p-2 bg-lime-300">Stock</th>
            <th class="border p-2 bg-lime-300">Description</th>
            <th class="border p-2 bg-lime-300">Category</th>
            <th class="border p-2 bg-lime-300">Brand</th>
            <th class="border p-2 bg-lime-300">Picture</th>
            <th class="border p-2 bg-lime-300">Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr class="text-center bg-yellow-100">
            <td class="border p-2">{{$loop->iteration}}</td>
            <td class="border p-2">{{$product->name}}</td>
            <td class="border p-2">{{$product->price}}</td>
            <td class="border p-2">{{$product->stock}}</td>
            <td class="border p-2">{{$product->description}}</td>
            <td class="border p-2">{{$product->category->name}}</td>
            <td class="border p-2">{{$product->brand->name}}</td>
            <td class="border p-2">
                <img src="{{ asset('images/' . $product->photopath) }}" alt="" class="h-20">
            </td>
            <td class="border p-2"> 
                <a href="{{route('products.edit',$product->id)}}
                "class="bg-indigo-700 text-whitr px-3 py-1.5 rounded-lg">Edit</a>
                <a href="{{route('products.destroy',$product->id)}}"
                class="bg-red-700 text-whitr px-3 py-1.5 rounded-lg"
                onclick= "return confirm('Are you sure to delete')">Delete</a>
            </td>

        </tr>
        @endforeach
    </tbody>

</table>

@endsection


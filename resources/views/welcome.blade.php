@extends('layouts.master')
@section('content')
<h1 class="text-blue-800 text-4xl text-center font-bold mt-10">Our Product</h1>
<div class="grid grid-cols-4 gap-10 px-20 py-12">
    @foreach($products as $product)

<div class="rounded-lg shadow-md p-4">
    <img src="{{asset('images/'.$product->photopath)}}" alt="" class="h-44 w-full object-cover">
    <h1 class="text-xl font-bold mt-2 ">{{$product->name}}</h1>
    <p class="text-gray-500">{{$product->description}}</p>
    <div class="flex justify-between items-center mt-4">
        <h1 class="text-xl font-bold">{{$product->price}}</h1>
        <button class="bg-blue-800 text-white px-3 py-1.5 rounded-lg">Add to Cart</button>
    </div>
</div>
@endforeach
</div>

     <div>
        <img src="" alt="This Is Home Page" class="h-88 w-full">
     </div>
@endsection

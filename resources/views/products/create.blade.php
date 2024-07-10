@extends('layouts.app')
@section('title')Create Product
@endsection
@section('content')
<form action="{{route('products.store')}}" class="mt-5" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-5">
        <select name="category_id" class="p-3 w-full rounded-lg">
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-5">
        <select name="brand_id" class="p-3 w-full rounded-lg">
            @foreach ($brands as $brand)
            <option value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach
        </select>
       </div>

    <div class="mb-5">
        <input type="text" placeholder="Enter Product Name" class="p-3 w-full rounded-lg"
        name="name" value="{{old('name')}}">
        @error('name')
        <div class="text-red-600 mt-2 text-5m">
            *{{$message}}
             </div>
             @enderror
    </div>
    <div class="grid grid-cols-2 gap-10">
    <div class="mb-5">
        <input type="text" placeholder="Enter Product Price" class="p-3 w-full rounded-lg"
        name="price" value="{{old('proice')}}">
        @error('price')
        <div class="text-red-600 mt-2 text-5m">
            *{{$message}}
             </div>
             @enderror
    </div>
    <div class="mb-5">
        <input type="text" placeholder="Enter Stock Name" class="p-3 w-full rounded-lg"
        name="stock" value="{{old('stock')}}">
        @error('stock')
        <div class="text-red-600 mt-2 text-5m">
            *{{$message}}
             </div>
             @enderror
    </div>
    </div>
    <div class="mb-5">
        <textarea name="description" id="" placeholder="Enter description of product"
        rows="6" class="p-3 w-full rounded-md">{{old('description')}}</textarea>
        @error('description')
        <div class="text-red-600 mt-2 text-5m">
            *{{$message}}
             </div>
             @enderror
    </div>
    <div class="mb-5">
        <input type="file"  class="p-3 w-full rounded-lg"
        name="photopath">
        @error('photopath')
        <div class="text-red-600 mt-2 text-5m">
            *{{$message}}
             </div>
             @enderror
    </div>
    <div class="flex justify-center">
        <button type="submit" class="bg-blue-600 text-white py-3 px-5 rounded-md
         front bold">Add Product</button>
         <a href="{{route('products.index')}}" class="bg-lime-500 text-white py-3 px-5
         rounded-md font-bold ml-3">Cancel</a>
    </div>

</form>
@endsection

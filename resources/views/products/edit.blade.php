
@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<form action="{{ route('products.update', $product->id) }}" class="mt-5" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="mb-5">
        <select name="category_id" class="p-3 w-full rounded-lg">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                @if($product->category_id == $category->id)
                selected
                @endif
                 >{{$category->name}}</option>
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-5">
        <select name="brand_id" class="p-3 w-full rounded-lg">
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}"
                @if($product->brand_id==$brand->id)
                selected
                @endif
                    >{{ $brand->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-5">
        <input type="text" placeholder="Enter Product Name"
        class="p-3 w-full rounded-lg" name="name" value="{{ $product->name }}">
        @error('name')
        <div class="text-red-600 mt-2 text-5m">
            *{{ $message }}
        </div>
        @enderror
    </div>

    <div class="grid grid-cols-2 gap-10">
        <div class="mb-5">
            <input type="text" placeholder="Enter Product Price"
            class="p-3 w-full rounded-lg" name="price" value="{{ $product->price }}">
            @error('price')
            <div class="text-red-600 mt-2 text-5m">
                *{{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-5">
            <input type="text" placeholder="Enter Stock"
            class="p-3 w-full rounded-lg" name="stock" value="{{ $product->stock }}">
            @error('stock')
            <div class="text-red-600 mt-2 text-5m">
                *{{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="mb-5">
        <textarea name="description" placeholder="Enter description of product" rows="6"
        class="p-3 w-full rounded-md">{{ $product->description }}</textarea>
        @error('description')
        <div class="text-red-600 mt-2 text-5m">
            *{{ $message }}
        </div>
        @enderror
    </div>
    <p>Current Picture</p>
    <img src="{{asset('images/'.$product->photopath)}}" alt="" class="h-44">
    <div class="mb-5">
        <input type="file" class="p-3 w-full rounded-lg" name="photopath">
        @error('photopath')
        <div class="text-red-600 mt-2 text-5m">
            *{{ $message }}
        </div>
        @enderror
    </div>

    <div class="flex justify-center">
        <button type="submit" class="bg-blue-600 text-white py-3 px-5 rounded-md font-bold">Update Product</button>
        <a href="{{ route('products.index') }}" class="bg-lime-500 text-white py-3 px-5 rounded-md font-bold ml-3">Cancel</a>
    </div>
</form>
@endsection


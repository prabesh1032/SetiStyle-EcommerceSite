@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<form action="{{ route('products.update', $product->id) }}" class="mt-5" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
        <select name="category_id" class="p-3 w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                @if($product->category_id == $category->id)
                selected
                @endif
                 >{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="text-red-600 mt-2 text-sm">
            *{{$message}}
        </div>
        @enderror
    </div>

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Brand</label>
        <select name="brand_id" class="p-3 w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}"
                @if($product->brand_id==$brand->id)
                selected
                @endif
                    >{{ $brand->name }}</option>
            @endforeach
        </select>
        @error('brand_id')
        <div class="text-red-600 mt-2 text-sm">
            *{{$message}}
        </div>
        @enderror
    </div>

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Product Name</label>
        <input type="text" class="p-3 w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
        name="name" value="{{ $product->name }}">
        @error('name')
        <div class="text-red-600 mt-2 text-sm">
            *{{ $message }}
        </div>
        @enderror
    </div>

    <div class="grid grid-cols-2 gap-10">
        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Product Price</label>
            <input type="number" class="p-3 w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
            name="price" value="{{ $product->price }}">
            @error('price')
            <div class="text-red-600 mt-2 text-sm">
                *{{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Stock Quantity</label>
            <input type="number" class="p-3 w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
            name="stock" value="{{ $product->stock }}">
            @error('stock')
            <div class="text-red-600 mt-2 text-sm">
                *{{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Product Description</label>
        <textarea name="description" rows="6" class="p-3 w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200">{{ $product->description }}</textarea>
        @error('description')
        <div class="text-red-600 mt-2 text-sm">
            *{{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Current Product Photo</label>
        <img id="currentImg" src="{{asset('images/'.$product->photopath)}}" alt="Current Product" class="h-44 rounded-lg mb-3 border border-gray-300">
        
        <label class="block text-sm font-semibold text-gray-700 mb-2">Upload New Photo (Optional)</label>
        <input type="file" class="p-3 w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
        name="photopath" id="photoInput">
        @error('photopath')
        <div class="text-red-600 mt-2 text-sm">
            *{{ $message }}
        </div>
        @enderror
        <!-- Photo Preview -->
        <div id="photoPreview" class="mt-3 hidden">
            <label class="block text-sm font-semibold text-gray-700 mb-2">New Photo Preview</label>
            <img id="previewImg" src="" alt="New Photo Preview" class="h-44 rounded-lg border border-blue-500">
        </div>
    </div>

    <div class="flex justify-center">
        <button type="submit" class="bg-blue-600 text-white py-3 px-5 rounded-md font-bold hover:bg-blue-700 transition">Update Product</button>
        <a href="{{ route('products.index') }}" class="bg-lime-500 text-white py-3 px-5 rounded-md font-bold ml-3 hover:bg-lime-600 transition">Cancel</a>
    </div>
</form>

<script>
    document.getElementById('photoInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('previewImg').src = event.target.result;
                document.getElementById('photoPreview').classList.remove('hidden');
                document.getElementById('currentImg').classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection
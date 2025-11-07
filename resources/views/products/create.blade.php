@extends('layouts.app')
@section('title')Create Product
@endsection
@section('content')
<form action="{{route('products.store')}}" class="mt-5" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
        <select name="category_id" class="p-3 w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
            <option value="">Select a category</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
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
            <option value="">Select a brand</option>
            @foreach ($brands as $brand)
            <option value="{{$brand->id}}">{{$brand->name}}</option>
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
        name="name" value="{{old('name')}}">
        @error('name')
        <div class="text-red-600 mt-2 text-sm">
            *{{$message}}
        </div>
        @enderror
    </div>

    <div class="grid grid-cols-2 gap-10">
        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Product Price</label>
            <input type="number" class="p-3 w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
            name="price" value="{{old('price')}}">
            @error('price')
            <div class="text-red-600 mt-2 text-sm">
                *{{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Stock Quantity</label>
            <input type="number" class="p-3 w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
            name="stock" value="{{old('stock')}}">
            @error('stock')
            <div class="text-red-600 mt-2 text-sm">
                *{{$message}}
            </div>
            @enderror
        </div>
    </div>

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Product Description</label>
        <textarea name="description" rows="6" class="p-3 w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200">{{old('description')}}</textarea>
        @error('description')
        <div class="text-red-600 mt-2 text-sm">
            *{{$message}}
        </div>
        @enderror
    </div>

    <div class="mb-5">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Product Photo</label>
        <input type="file" class="p-3 w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
        name="photopath" id="photoInput">
        @error('photopath')
        <div class="text-red-600 mt-2 text-sm">
            *{{$message}}
        </div>
        @enderror
        <!-- Photo Preview -->
        <div id="photoPreview" class="mt-3 hidden">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Photo Preview</label>
            <img id="previewImg" src="" alt="Photo Preview" class="h-44 rounded-lg border border-gray-300">
        </div>
    </div>

    <div class="flex justify-center">
        <button type="submit" class="bg-blue-600 text-white py-3 px-5 rounded-md font-bold hover:bg-blue-700 transition">Add Product</button>
        <a href="{{route('products.index')}}" class="bg-lime-500 text-white py-3 px-5 rounded-md font-bold ml-3 hover:bg-lime-600 transition">Cancel</a>
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
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection

@extends('layouts.app')
@section('title')Create Brand
@endsection
@section('content')
<form action="{{route('brand.store')}}" class="mt-5" method="post">
    @csrf

    <div class="mb-5">
        <input type="text" placeholder="Enter Brand Name" class="p-3 w-full rounded-lg"
        name="name" value="{{old('name')}}">
        @error('name')
        <div class="text-red-600 mt-2 text-5m">
            *{{$message}}
             </div>
             @enderror
    </div>
    <div class="flex justify-center">
        <button type="submit" class="bg-blue-600 text-white py-3 px-5 rounded-md
         front bold">Add Brand</button>
         <a href="{{route('brand.index')}}" class="bg-lime-500 text-white py-3 px-5
         rounded-md font-bold ml-3">Cancel</a>
    </div>

</form>
@endsection

@extends('layouts.master')
@section('content')
    <div class="grid grid-cols-4 px-20 my-10 gap-10">
        <div class="col-span-1">
            <img src="{{asset('images/'.$product->photopath)}}" alt="" class="h-96 w-full object-cover">
        </div>
        <div class="col-span-2 px-4 border-x">
            <h1 class="text-4xl font-bold text-blue-800">{{$product->name}}</h1>
            <h1 class="text-2xl font-bold mt-4">Rs.{{$product->price}}</h1>
            <form action="{{route('cart.store')}} "method="POST">
            @csrf
                <div class="flex items-center">
                    <span class=" py-2 bg-blue-600 text-white px-4 text-xl cursor-pointer" onclick="decreaseqty()">-</span>
                    <input name="quantity" type="text" class="w-12 py-5 h-10 text-center" value="1" readonly id="quantity">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <span class=" py-2 bg-blue-600 text-white px-4 text-xl cursor-pointer" onclick="increaseqty()">+</span>
                </div>
                <p class="text-gray-500 mt-1">In stock: <span id="stock">{{$product->stock}}</span></p>
                <button type="submit" class="bg-gradient-to-r from-red-600 via-yellow-400 to-gray-600
                 text-white px-3 py-1.5 rounded-lg mt-4 inline-block">Add to Cart</button>
            </form>
        </div>
        <div>
            <p>Free Delivery</p>
            <p>Delivery in 2-3 days</p>
            <p>7 days return policy</p>
        </div>
    </div>
    <div class="px-20 mb-12">
    <h1 class="text-2xl font-bold">Description</h1>
    <p class="text-gray-500 mt-4">{{$product->description}}
    </div>
    <div class="my-10 px-16">
        <h1 class="text-2xl font-bold">Related Product</h1>
        <div class="grid grid-cols-4 gap-10 mt-6">
            @foreach($relatedproducts as $relatedproduct)
            <div class="border-shadaw-md rounded-lg p-2">
                <a href="({{route('viewproduct',$relatedproduct->id)}}">
                    <img src="{{asset('images/'.$relatedproduct->photopath)}}" alt=""
                    class="h-60 w-full object-cover">
                    <h1 class="text-lg font-bold mt-2">{{$relatedproduct->name}}</h1>
                    <p class="text-gray-500">Rs,{{$relatedproduct->price}}</p>
                </a>
            </div>
            @endforeach
         </div>

    </div>
    <script>

        function increaseqty()
        {
            var quantity = document.getElementById('quantity').value;
            var stock = document.getElementById('stock').innerHTML;
            if(quantity<stock)
            {
                quantity++;
                document.getElementById('quantity').value = quantity;
            }
        }

        function decreaseqty()
        {
            var quantity = document.getElementById('quantity').value;
            if(quantity>1)
            {
                quantity--;
                document.getElementById('quantity').value = quantity;
            }
        }
    </script>
@endsection

@extends('layouts.app')
@section('title')DashBoard
@endsection
@section('content')
<div class="grid grid-cols-3 gap-10 p-4">
    <div class="px-5 py-8 bg-purple-500 text-white flex justify-between items-center rounded-lg
     hover:shadow-lg transform hover:scale-105 transition duration-300">
    <h2 class="text-2xl font-bold">Total Users</h2>
    <p class="text-3xl font-bold">100</p>
    </div>
    <div class="px-5 py-8 bg-red-500 text-white flex justify-between items-center rounded-lg
    hover:shadow-lg transform hover:scale-105 transition duration-300">
        <h2 class="text-2xl font-bold">Total Categories</h2>
        <p class="text-3xl font-bold">{{$totalcategories}}</p>
    </div>
    <div class="px-5 py-8 bg-yellow-500 text-white flex justify-between items-center rounded-lg
    hover:shadow-lg transform hover:scale-105 transition duration-300">
        <h2 class="text-2xl font-bold"> Total Product</h2>
        <p class="text-3xl font-bold">{{$totalproducts}}</p>
    </div>
    <div class="px-5 py-8 bg-lime-500 text-white flex justify-between items-center rounded-lg
    hover:shadow-lg transform hover:scale-105 transition duration-300">
        <h2 class="text-2xl font-bold">Total Brand</h2>
        <p class="text-3xl font-bold">{{$totalbrands}}</p>
    </div>
    <div class="px-5 py-8 bg-blue-500 text-white flex justify-between items-center rounded-lg
    hover:shadow-lg transform hover:scale-105 transition duration-300">
        <h2 class="text-2xl font-bold">Total Orders</h2>
        <p class="text-3xl font-bold">100</p>
    </div>
    <div class="px-5 py-8 bg-orange-500 text-white flex justify-between items-center rounded-lg
    hover:shadow-lg transform hover:scale-105 transition duration-300">
        <h2 class="text-2xl font-bold">Total Sales</h2>
        <p class="text-3xl font-bold">100</p>
    </div>
    <div class="px-5 py-8 bg-green-500 text-white flex justify-between items-center rounded-lg
    hover:shadow-lg transform hover:scale-105 transition duration-300">
        <h2 class="text-2xl font-bold">Total visit</h2>
        <p class="text-3xl font-bold">100</p>
    </div>
    <div class="px-5 py-8 bg-pink-500 text-white flex justify-between items-center rounded-lg
    hover:shadow-lg transform hover:scale-105 transition duration-300">
        <h2 class="text-2xl font-bold">Total Users</h2>
        <p class="text-3xl font-bold">100</p>
    </div>
    <div class="px-5 py-8 bg-green-500 text-white flex justify-between items-center rounded-lg
    hover:shadow-lg transform hover:scale-105 transition duration-300">
        <h2 class="text-2xl font-bold">Female Users</h2>
        <p class="text-3xl font-bold">25</p>
    </div>
</div>
@endsection

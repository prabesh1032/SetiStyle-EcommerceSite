@extends('layouts.app')

@section('title') Dashboard @endsection

@section('content')
<div class="container mx-auto p-6">
    <!-- Header Section -->
    <div class="mb-8 text-center">
        <h1 class="text-4xl font-semibold text-gray-800">Chill-Shop Dashboard</h1>
        <p class="text-xl text-gray-600">Manage your store with ease. Here’s a quick overview of your business performance.</p>
    </div>

    <!-- Stats Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">
        <!-- Total Sales -->
        <div class="bg-blue-500 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
            <div class="flex justify-between items-center">
                <i class="ri-money-dollar-circle-line text-4xl"></i>
                <div>
                    <h3 class="text-2xl font-bold">Total Sales</h3>
                    <p class="text-3xl font-bold">$125,000</p>
                </div>
            </div>
        </div>

        <!-- Total Products -->
        <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
            <div class="flex justify-between items-center">
                <i class="ri-product-hunt-line text-4xl"></i>
                <div>
                    <h3 class="text-2xl font-bold">Total Products</h3>
                    <p class="text-3xl font-bold">{{$totalproducts}}</p>
                </div>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
            <div class="flex justify-between items-center">
                <i class="ri-file-list-3-line text-4xl"></i>
                <div>
                    <h3 class="text-2xl font-bold">Total Orders</h3>
                    <p class="text-3xl font-bold">{{$totalorders}}</p>
                </div>
            </div>
        </div>

        <!-- Total Customers -->
        <div class="bg-purple-500 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
            <div class="flex justify-between items-center">
                <i class="ri-user-line text-4xl"></i>
                <div>
                    <h3 class="text-2xl font-bold">Total Customers</h3>
                    <p class="text-3xl font-bold"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="mb-12">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Recent Activity</h2>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <ul class="space-y-4">
                    <li class="flex justify-between items-center">
                        <div class="flex items-center">
                            <i class="ri-check-line text-green-500 text-2xl"></i>
                            <span class="ml-4 text-gray-700">Order #12345 placed by John Doe</span>
                        </div>
                        <span class="text-gray-600">2 minutes ago</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <div class="flex items-center">
                            <i class="ri-check-line text-green-500 text-2xl"></i>
                            <span class="ml-4 text-gray-700">Order #12344 placed by Jane Smith</span>
                        </div>
                        <span class="text-gray-600">15 minutes ago</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <div class="flex items-center">
                            <i class="ri-check-line text-green-500 text-2xl"></i>
                            <span class="ml-4 text-gray-700">New product added: "Premium Headphones"</span>
                        </div>
                        <span class="text-gray-600">1 hour ago</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <div class="flex items-center">
                            <i class="ri-check-line text-green-500 text-2xl"></i>
                            <span class="ml-4 text-gray-700">Product "Smartwatch" out of stock</span>
                        </div>
                        <span class="text-gray-600">2 hours ago</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Sales Performance -->
    <div class="mb-12">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Sales Performance</h2>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">Sales Last 7 Days</h3>
                    <p class="text-gray-600">Track your sales trends</p>
                </div>
                <i class="ri-bar-chart-box-line text-4xl text-gray-500"></i>
            </div>
            <div>
                <div id="salesChart" class="w-full h-64 bg-gray-100 rounded-lg shadow-inner"></div> <!-- You can integrate a chart here using a library -->
            </div>
        </div>
    </div>

    <!-- Recent Reviews -->
    <div class="mb-12">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Recent Product Reviews</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <h3 class="text-xl font-semibold text-gray-800">Product A</h3>
                <p class="text-gray-600">"Great product, highly recommended!"</p>
                <span class="text-gray-500 text-sm">4.5 stars</span>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <h3 class="text-xl font-semibold text-gray-800">Product B</h3>
                <p class="text-gray-600">"Good quality but needs improvement in design."</p>
                <span class="text-gray-500 text-sm">3.8 stars</span>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <h3 class="text-xl font-semibold text-gray-800">Product C</h3>
                <p class="text-gray-600">"Excellent value for money. Will buy again."</p>
                <span class="text-gray-500 text-sm">5 stars</span>
            </div>
        </div>
    </div>
</div>
@endsection

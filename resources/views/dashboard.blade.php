@extends('layouts.app')

@section('title') Dashboard @endsection

@section('content')
<div class="container mx-auto p-3 lg:p-6">

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 lg:gap-6 mb-6 lg:mb-8">
        <!-- Total Products -->
        <a href="{{ route('products.index') }}" class="bg-white rounded-lg lg:rounded-xl shadow-sm border border-gray-200 overflow-hidden transition-all hover:shadow-md transform hover:scale-105">
            <div class="p-4 lg:p-6 bg-purple-300">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm lg:text-lg font-medium text-gray-700">Total Products</h3>
                    <div class="p-2 lg:p-3 rounded-full bg-blue-100 text-blue-600">
                        <i class="ri-box-3-line text-lg lg:text-xl"></i>
                    </div>
                </div>
                <p class="text-xl lg:text-2xl font-bold mt-3 lg:mt-4 text-gray-800">{{ $totalproducts }}</p>
            </div>
        </a>

        <!-- Total Categories -->
        <a href="{{ route('categories.index') }}" class="bg-white rounded-lg lg:rounded-xl shadow-sm border border-gray-200 overflow-hidden transition-all hover:shadow-md transform hover:scale-105">
            <div class="p-4 lg:p-6 bg-amber-300">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm lg:text-lg font-medium text-gray-700">Total Categories</h3>
                    <div class="p-2 lg:p-3 rounded-full bg-purple-100 text-purple-600">
                        <i class="ri-list-check-2 text-lg lg:text-xl"></i>
                    </div>
                </div>
                <p class="text-xl lg:text-2xl font-bold mt-3 lg:mt-4 text-gray-800">{{ $totalcategories }}</p>
            </div>
        </a>

        <!-- Total Brands -->
        <a href="{{ route('brand.index') }}" class="bg-white rounded-lg lg:rounded-xl shadow-sm border border-gray-200 overflow-hidden transition-all hover:shadow-md transform hover:scale-105">
            <div class="p-4 lg:p-6 bg-blue-300">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm lg:text-lg font-medium text-gray-700">Total Brands</h3>
                    <div class="p-2 lg:p-3 rounded-full bg-green-100 text-green-600">
                        <i class="ri-bookmark-line text-lg lg:text-xl"></i>
                    </div>
                </div>
                <p class="text-xl lg:text-2xl font-bold mt-3 lg:mt-4 text-gray-800">{{ $totalbrands }}</p>
            </div>
        </a>

        <!-- Total Orders -->
        <a href="{{ route('orders.index') }}" class="bg-white rounded-lg lg:rounded-xl shadow-sm border border-gray-200 overflow-hidden transition-all hover:shadow-md transform hover:scale-105">
            <div class="p-4 lg:p-6 bg-green-300">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm lg:text-lg font-medium text-gray-700">Total Orders</h3>
                    <div class="p-2 lg:p-3 rounded-full bg-red-100 text-red-600">
                        <i class="ri-shopping-cart-line text-lg lg:text-xl"></i>
                    </div>
                </div>
                <p class="text-xl lg:text-2xl font-bold mt-3 lg:mt-4 text-gray-800">{{ $totalorders }}</p>
            </div>
        </a>

        <!-- Pending Orders -->
        <div class="bg-white rounded-lg lg:rounded-xl shadow-sm border border-gray-200 overflow-hidden transition-all hover:shadow-md transform hover:scale-105">
            <div class="p-4 lg:p-6 bg-yellow-300">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm lg:text-lg font-medium text-gray-700">Pending Orders</h3>
                    <div class="p-2 lg:p-3 rounded-full bg-orange-100 text-orange-600">
                        <i class="ri-time-line text-lg lg:text-xl"></i>
                    </div>
                </div>
                <p class="text-xl lg:text-2xl font-bold mt-3 lg:mt-4 text-gray-800">{{ $pendingorders }}</p>
            </div>
        </div>

        <!-- Delivered Orders -->
        <div class="bg-white rounded-lg lg:rounded-xl shadow-sm border border-gray-200 overflow-hidden transition-all hover:shadow-md transform hover:scale-105">
            <div class="p-4 lg:p-6 bg-emerald-300">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm lg:text-lg font-medium text-gray-700">Delivered Orders</h3>
                    <div class="p-2 lg:p-3 rounded-full bg-green-100 text-green-600">
                        <i class="ri-check-double-line text-lg lg:text-xl"></i>
                    </div>
                </div>
                <p class="text-xl lg:text-2xl font-bold mt-3 lg:mt-4 text-gray-800">{{ $deliverorders }}</p>
            </div>
        </div>
    </div>

    <!-- Orders Performance Chart -->
    <div class="mb-8 lg:mb-12">
        <h2 class="text-2xl lg:text-3xl font-semibold text-gray-800 mb-4 lg:mb-6 px-1">Orders Performance</h2>
        <div class="bg-white p-4 lg:p-6 rounded-lg lg:rounded-xl shadow-lg border border-gray-200">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 lg:mb-6 space-y-3 sm:space-y-0">
                <div>
                    <h3 class="text-lg lg:text-2xl font-bold text-gray-800">Orders Last 30 Days</h3>
                    <p class="text-sm lg:text-base text-gray-600">Track your daily order trends</p>
                </div>
                <div class="p-2 lg:p-3 rounded-full bg-blue-100 text-blue-600 w-fit">
                    <i class="ri-bar-chart-box-line text-xl lg:text-2xl"></i>
                </div>
            </div>
            <div class="relative">
                <div class="h-64 sm:h-80 lg:h-96">
                    <canvas id="ordersChart" class="w-full h-full"></canvas>
                </div>
            </div>

            <!-- Chart Summary -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 lg:gap-4 mt-4 lg:mt-6 pt-4 lg:pt-6 border-t">
                <div class="text-center p-3 bg-gray-50 rounded-lg">
                    <p class="text-xl lg:text-2xl font-bold text-blue-600">{{ array_sum($monthlyOrders) }}</p>
                    <p class="text-xs lg:text-sm text-gray-600">Total Orders (30 days)</p>
                </div>
                <div class="text-center p-3 bg-gray-50 rounded-lg">
                    <p class="text-xl lg:text-2xl font-bold text-green-600">{{ round(array_sum($monthlyOrders) / 30, 1) }}</p>
                    <p class="text-xs lg:text-sm text-gray-600">Daily Average</p>
                </div>
                <div class="text-center p-3 bg-gray-50 rounded-lg">
                    <p class="text-xl lg:text-2xl font-bold text-purple-600">{{ max($monthlyOrders) }}</p>
                    <p class="text-xs lg:text-sm text-gray-600">Best Day</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Orders Chart
        const ctx = document.getElementById('ordersChart').getContext('2d');
        const ordersChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($monthlyLabels) !!},
                datasets: [{
                    label: 'Daily Orders',
                    data: {!! json_encode($monthlyOrders) !!},
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: window.innerWidth < 768 ? 2 : 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: 'rgb(59, 130, 246)',
                    pointBorderColor: 'white',
                    pointBorderWidth: 2,
                    pointRadius: window.innerWidth < 768 ? 3 : 5,
                    pointHoverRadius: window.innerWidth < 768 ? 6 : 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: 'white',
                        bodyColor: 'white',
                        borderColor: 'rgb(59, 130, 246)',
                        borderWidth: 1,
                        cornerRadius: 8,
                        displayColors: false,
                        titleFont: {
                            size: window.innerWidth < 768 ? 12 : 14
                        },
                        bodyFont: {
                            size: window.innerWidth < 768 ? 11 : 13
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            color: '#6B7280',
                            font: {
                                size: window.innerWidth < 768 ? 10 : 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#6B7280',
                            maxTicksLimit: window.innerWidth < 768 ? 6 : 10,
                            font: {
                                size: window.innerWidth < 768 ? 10 : 12
                            },
                            maxRotation: window.innerWidth < 768 ? 45 : 0
                        }
                    }
                },
                elements: {
                    point: {
                        hoverBackgroundColor: 'rgb(59, 130, 246)'
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });

        // Handle window resize for chart responsiveness
        window.addEventListener('resize', function() {
            if (ordersChart) {
                ordersChart.resize();

                // Update mobile-specific settings
                const isMobile = window.innerWidth < 768;
                ordersChart.data.datasets[0].borderWidth = isMobile ? 2 : 3;
                ordersChart.data.datasets[0].pointRadius = isMobile ? 3 : 5;
                ordersChart.data.datasets[0].pointHoverRadius = isMobile ? 6 : 8;
                ordersChart.options.scales.x.ticks.maxTicksLimit = isMobile ? 6 : 10;
                ordersChart.options.scales.x.ticks.maxRotation = isMobile ? 45 : 0;
                ordersChart.update();
            }
        });
    </script>
</div>
@endsection

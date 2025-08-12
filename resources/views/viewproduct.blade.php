@extends('layouts.master')

@section('content')
<!-- Hero Section with Breadcrumb -->
<div class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Product Title -->
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold bg-gradient-to-r from-black via-gray-800 to-black bg-clip-text text-transparent mb-4">
                {{ $product->name }}
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">
                Discover premium quality and exceptional value with our featured product
            </p>
        </div>
    </div>
</div>

<!-- Main Product Section -->
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
        <!-- Product Images Gallery -->
        <div class="space-y-6">
            <!-- Main Product Image -->
            <div class="relative group bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 rounded-3xl"></div>
                <div class="relative">
                    <img src="{{ asset('images/' . $product->photopath) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-96 md:h-[500px] object-cover rounded-2xl shadow-lg group-hover:scale-[1.02] transition-transform duration-700">

                    <!-- Image Overlay with Stock Status -->
                    <div class="absolute top-6 right-6">
                        @if($product->stock > 0)
                            <div class="bg-green-500 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg backdrop-blur-sm">
                                <i class="ri-check-line mr-1"></i>
                                {{ $product->stock }} In Stock
                            </div>
                        @else
                            <div class="bg-red-500 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg backdrop-blur-sm">
                                <i class="ri-close-line mr-1"></i>
                                Out of Stock
                            </div>
                        @endif
                    </div>

                    <!-- Zoom Icon -->
                    <div class="absolute bottom-6 right-6 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="bg-white/90 backdrop-blur-sm p-3 rounded-full shadow-lg cursor-pointer hover:bg-white transition-colors">
                            <i class="ri-zoom-in-line text-xl text-gray-700"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Features Highlights -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-4 rounded-xl border border-green-100">
                    <div class="flex items-center space-x-3">
                        <div class="bg-green-100 p-2 rounded-lg">
                            <i class="ri-shield-check-line text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-green-800">Quality Assured</p>
                            <p class="text-sm text-green-600">Premium Materials</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-blue-50 to-cyan-50 p-4 rounded-xl border border-blue-100">
                    <div class="flex items-center space-x-3">
                        <div class="bg-blue-100 p-2 rounded-lg">
                            <i class="ri-truck-line text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-blue-800">Free Shipping</p>
                            <p class="text-sm text-blue-600">2-3 Days Delivery</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details & Purchase Section -->
        <div class="space-y-8">
            <!-- Product Info Card -->
            <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
                <!-- Price Section -->
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-medium text-gray-500 uppercase tracking-wide">Price</span>
                        <div class="flex items-center space-x-2">
                            <i class="ri-star-fill text-yellow-400"></i>
                            <i class="ri-star-fill text-yellow-400"></i>
                            <i class="ri-star-fill text-yellow-400"></i>
                            <i class="ri-star-fill text-yellow-400"></i>
                            <i class="ri-star-half-line text-yellow-400"></i>
                            <span class="text-sm text-gray-600 ml-1">(4.5)</span>
                        </div>
                    </div>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-4xl font-bold text-gray-900">Rs {{ number_format($product->price) }}</span>
                        <span class="text-lg text-gray-500 line-through">Rs {{ number_format($product->price * 1.2) }}</span>
                        <span class="bg-red-100 text-red-800 text-sm px-2 py-1 rounded-full font-semibold">17% OFF</span>
                    </div>
                </div>

                <!-- Product Features -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Key Features</h3>
                    <div class="grid grid-cols-1 gap-3">
                        <div class="flex items-center space-x-3">
                            <i class="ri-check-double-line text-green-500"></i>
                            <span class="text-gray-700">Premium Quality Materials</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="ri-check-double-line text-green-500"></i>
                            <span class="text-gray-700">1 Year Warranty Included</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="ri-check-double-line text-green-500"></i>
                            <span class="text-gray-700">Easy Returns & Exchange</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="ri-check-double-line text-green-500"></i>
                            <span class="text-gray-700">24/7 Customer Support</span>
                        </div>
                    </div>
                </div>

                <!-- Purchase Form -->
                <form method="POST" action="{{ route('cart.store') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    @if($product->stock > 0)
                        <!-- Quantity Selector -->
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-3">
                                Quantity
                            </label>
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center bg-gray-50 rounded-xl border border-gray-200">
                                    <button type="button"
                                            class="p-3 hover:bg-gray-200 text-gray-600 rounded-l-xl transition-colors"
                                            onclick="decreaseqty()">
                                        <i class="ri-subtract-line text-xl"></i>
                                    </button>
                                    <input type="text"
                                           id="quantity"
                                           name="quantity"
                                           class="w-16 text-center border-0 bg-transparent focus:outline-none text-lg font-semibold"
                                           min="1"
                                           max="{{ $product->stock }}"
                                           value="1">
                                    <button type="button"
                                            class="p-3 hover:bg-gray-200 text-gray-600 rounded-r-xl transition-colors"
                                            onclick="increaseqty()">
                                        <i class="ri-add-line text-xl"></i>
                                    </button>
                                </div>
                                <span class="text-sm text-gray-500">
                                    {{ $product->stock }} available
                                </span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-4">
                            <button type="submit"
                                    class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 px-6 rounded-xl font-semibold text-lg hover:from-blue-700 hover:to-purple-700 transform hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2">
                                <i class="ri-shopping-cart-line text-xl"></i>
                                <span>Add to Cart</span>
                            </button>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <div class="bg-red-50 rounded-xl p-6 mb-4">
                                <i class="ri-error-warning-line text-red-500 text-4xl mb-2"></i>
                                <p class="text-red-800 font-semibold text-lg">Currently Out of Stock</p>
                                <p class="text-red-600 text-sm mt-1">We'll notify you when it's available</p>
                            </div>
                            <button type="button"
                                    class="w-full bg-gray-400 text-white py-4 px-6 rounded-xl font-semibold text-lg cursor-not-allowed flex items-center justify-center space-x-2">
                                <i class="ri-notification-line text-xl"></i>
                                <span>Notify When Available</span>
                            </button>
                        </div>
                    @endif
                </form>

                <!-- Additional Info -->
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                        <div class="flex items-center space-x-2">
                            <i class="ri-shield-check-line text-green-500"></i>
                            <span>Secure Payment</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="ri-refresh-line text-blue-500"></i>
                            <span>Easy Returns</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="ri-customer-service-line text-purple-500"></i>
                            <span>24/7 Support</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="ri-truck-line text-orange-500"></i>
                            <span>Fast Delivery</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Product Description Section -->
    <div class="bg-white rounded-3xl shadow-xl p-8 mb-16 border border-gray-100">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Product Description</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto rounded-full"></div>
            </div>

            <div class="prose prose-lg max-w-none">
                <p class="text-gray-700 leading-relaxed text-lg mb-6">
                    This exceptional product represents the perfect blend of <strong>premium quality</strong>, innovative design, and outstanding value.
                    Meticulously crafted with attention to every detail, it delivers superior performance that exceeds expectations.
                </p>

                <div class="grid md:grid-cols-2 gap-8 mt-8">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="ri-settings-3-line text-blue-600 mr-2"></i>
                            Technical Excellence
                        </h3>
                        <p class="text-gray-600">
                            Engineered with precision and built to last, featuring cutting-edge technology
                            that ensures reliability and performance in every use case.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="ri-heart-line text-red-500 mr-2"></i>
                            Customer Satisfaction
                        </h3>
                        <p class="text-gray-600">
                            Designed with our customers in mind, this product combines functionality
                            with style, making it perfect for both daily use and special occasions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products Section -->
    <div class="mb-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">You Might Also Like</h2>
            <p class="text-gray-600 text-lg">Discover more amazing products from our collection</p>
            <div class="w-24 h-1 bg-gradient-to-r from-purple-600 to-pink-600 mx-auto rounded-full mt-4"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedproducts as $relatedproduct)
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl border border-gray-100 overflow-hidden transform transition-all duration-300 hover:-translate-y-2">
                    <a href="{{ route('viewproduct', $relatedproduct->id) }}" class="block">
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('images/' . $relatedproduct->photopath) }}"
                                 alt="{{ $relatedproduct->name }}"
                                 class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">

                            <!-- Quick View Overlay -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                                <div class="bg-white rounded-full p-3 transform scale-0 group-hover:scale-100 transition-transform duration-300">
                                    <i class="ri-eye-line text-xl text-gray-700"></i>
                                </div>
                            </div>

                            <!-- Sale Badge -->
                            <div class="absolute top-3 left-3">
                                <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full font-semibold">
                                    Sale
                                </span>
                            </div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-300 line-clamp-2">
                                {{ $relatedproduct->name }}
                            </h3>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-1">
                                    <span class="text-xl font-bold text-gray-900">Rs {{ number_format($relatedproduct->price) }}</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    @for($i = 0; $i < 5; $i++)
                                        <i class="ri-star-fill text-yellow-400 text-sm"></i>
                                    @endfor
                                </div>
                            </div>
                            <div class="mt-4">
                                <button class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-2 rounded-xl font-medium opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                                    Quick Add to Cart
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    // Quantity Control Functions
    function increaseqty() {
        const quantityInput = document.getElementById('quantity');
        const maxStock = {{ $product->stock }};
        let quantity = parseInt(quantityInput.value);

        if (quantity < maxStock) {
            quantityInput.value = quantity + 1;
            updateQuantityDisplay();
        } else {
            // Show max stock message
            showStockMessage('Maximum stock reached!');
        }
    }

    function decreaseqty() {
        const quantityInput = document.getElementById('quantity');
        let quantity = parseInt(quantityInput.value);

        if (quantity > 1) {
            quantityInput.value = quantity - 1;
            updateQuantityDisplay();
        } else {
            // Show minimum quantity message
            showStockMessage('Minimum quantity is 1');
        }
    }

    function updateQuantityDisplay() {
        const quantityInput = document.getElementById('quantity');
        const quantity = parseInt(quantityInput.value);
        const price = {{ $product->price }};
        const totalPrice = quantity * price;

        // Add visual feedback
        quantityInput.style.transform = 'scale(1.1)';
        setTimeout(() => {
            quantityInput.style.transform = 'scale(1)';
        }, 150);
    }

    function showStockMessage(message) {
        // Create temporary message element
        const messageEl = document.createElement('div');
        messageEl.className = 'fixed top-4 right-4 bg-red-100 text-red-800 px-4 py-2 rounded-lg shadow-lg z-50 transition-all duration-300';
        messageEl.textContent = message;

        document.body.appendChild(messageEl);

        // Remove message after 2 seconds
        setTimeout(() => {
            messageEl.style.opacity = '0';
            messageEl.style.transform = 'translateX(100%)';
            setTimeout(() => {
                document.body.removeChild(messageEl);
            }, 300);
        }, 2000);
    }

    // Add smooth scrolling for related products
    document.addEventListener('DOMContentLoaded', function() {
        // Add animation to elements on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });

        // Observe all animated elements
        const animatedElements = document.querySelectorAll('.group, .space-y-8 > div, .grid > div');
        animatedElements.forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    });

    // Add to cart with loading animation
    document.querySelector('form').addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;

        submitBtn.innerHTML = '<i class="ri-loader-4-line animate-spin mr-2"></i>Adding to Cart...';
        submitBtn.disabled = true;

        // Re-enable after a short delay (form will submit)
        setTimeout(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 3000);
    });
</script>

@endsection

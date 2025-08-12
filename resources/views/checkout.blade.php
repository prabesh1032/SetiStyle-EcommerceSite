@extends('layouts.master')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold bg-gradient-to-r from-black via-gray-800 to-black bg-clip-text text-transparent mb-4">
                Secure Checkout
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Complete your purchase with our secure and fast checkout process
            </p>
        </div>
    </div>
</div>

<!-- Main Checkout Content -->
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Checkout Form -->
    <form action="{{ route('order.store') }}" method="post" class="space-y-8">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Product Information Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-800 flex items-center">
                            <i class="ri-shopping-bag-line text-blue-600 mr-3 text-2xl"></i>
                            Order Details
                        </h3>
                    </div>

                    <!-- Product Image -->
                    <div class="p-6">
                        <div class="relative group">
                            <img src="{{ asset('images/'.$cart->product->photopath) }}"
                                 alt="{{ $cart->product->name }}"
                                 class="w-full h-52 object-cover rounded-2xl shadow-lg group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl"></div>
                        </div>

                        <!-- Product Details -->
                        <div class="mt-6 space-y-4">
                            <h2 class="text-xl font-bold text-gray-800">{{ $cart->product->name }}</h2>

                            <!-- Price Details -->
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                                    <span class="text-sm text-gray-600 flex items-center">
                                        <i class="ri-money-dollar-circle-line text-green-500 mr-2"></i>
                                        Unit Price:
                                    </span>
                                    <span class="font-semibold text-gray-800">Rs {{ number_format($cart->product->price) }}</span>
                                </div>

                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                                    <span class="text-sm text-gray-600 flex items-center">
                                        <i class="ri-box-line text-blue-500 mr-2"></i>
                                        Quantity:
                                    </span>
                                    <span class="font-semibold text-gray-800">{{ $cart->quantity }}</span>
                                </div>

                                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border border-green-200">
                                    <span class="font-medium text-green-800 flex items-center">
                                        <i class="ri-calculator-line text-green-600 mr-2"></i>
                                        Total Amount:
                                    </span>
                                    <span class="text-xl font-bold text-green-600">Rs {{ number_format($cart->product->price * $cart->quantity) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden Fields (Maintaining exact functionality) -->
                    <input type="hidden" name="product_id" value="{{ $cart->product_id }}">
                    <input type="hidden" name="quantity" value="{{ $cart->quantity }}">
                    <input type="hidden" name="price" value="{{ $cart->product->price }}">
                    <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                    <input type="hidden" name="payment_method" value="COD">
                </div>
            </div>

            <!-- Shipping Information Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-4 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-800 flex items-center">
                            <i class="ri-truck-line text-purple-600 mr-3 text-2xl"></i>
                            Shipping Information
                        </h3>
                    </div>

                    <!-- Form Fields -->
                    <div class="p-6 space-y-6">
                        <!-- Full Name -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                <i class="ri-user-line text-gray-500 mr-2"></i>Full Name
                            </label>
                            <input type="text"
                                   name="name"
                                   placeholder="Enter your full name"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                                   value="{{ auth()->user()->name }}"
                                   required>
                        </div>

                        <!-- Address -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                <i class="ri-map-pin-line text-gray-500 mr-2"></i>Delivery Address
                            </label>
                            <textarea name="address"
                                      placeholder="Enter your complete address with landmarks"
                                      rows="3"
                                      class="w-full border border-gray-200 rounded-xl px-4 py-3 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 resize-none"
                                      required></textarea>
                        </div>

                        <!-- Phone Number -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                <i class="ri-phone-line text-gray-500 mr-2"></i>Phone Number
                            </label>
                            <input type="tel"
                                   name="phone"
                                   placeholder="Enter your phone number"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                                   required>
                        </div>

                        <!-- Delivery Instructions -->
                        <div class="bg-blue-50 rounded-xl p-4 border border-blue-200">
                            <h4 class="text-sm font-semibold text-blue-800 mb-2">
                                <i class="ri-information-line mr-2"></i>Delivery Instructions
                            </h4>
                            <ul class="text-xs text-blue-700 space-y-1">
                                <li>• Please provide accurate address and phone number</li>
                                <li>• Delivery within 2-3 business days</li>
                                <li>• Contact number is required for delivery coordination</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment & Order Summary Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-800 flex items-center">
                            <i class="ri-secure-payment-line text-green-600 mr-3 text-2xl"></i>
                            Payment & Summary
                        </h3>
                    </div>

                    <div class="p-6 space-y-6">
                        <!-- Order Summary -->
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-4 border border-gray-200">
                            <h4 class="font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="ri-file-list-2-line text-gray-600 mr-2"></i>
                                Order Summary
                            </h4>
                            <div class="space-y-3">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Subtotal:</span>
                                    <span class="font-medium">Rs {{ number_format($cart->product->price * $cart->quantity) }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Shipping:</span>
                                    <span class="font-medium text-green-600">Free</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Tax:</span>
                                    <span class="font-medium">Rs 0</span>
                                </div>
                                <div class="border-t border-gray-300 pt-2">
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-800">Total Amount:</span>
                                        <span class="text-xl font-bold text-green-600">Rs {{ number_format($cart->product->price * $cart->quantity) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Buttons -->
                        <div class="space-y-3">
                            <!-- COD Button -->
                            <button type="submit"
                                    class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-4 px-6 rounded-xl font-semibold text-lg hover:from-blue-700 hover:to-blue-800 transform hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2">
                                <i class="ri-hand-coin-line text-xl"></i>
                                <span>Place Order (COD)</span>
                            </button>

                            <!-- eSewa Payment Container -->
                            <div id="esewa-form-container"></div>
                        </div>

                        <!-- Security Features -->
                        <div class="bg-blue-50 rounded-xl p-4 border border-blue-200">
                            <h4 class="text-sm font-semibold text-blue-800 mb-3">
                                <i class="ri-shield-check-line mr-2"></i>Secure Checkout
                            </h4>
                            <div class="grid grid-cols-2 gap-4 text-xs text-blue-700">
                                <div class="flex items-center space-x-2">
                                    <i class="ri-lock-line text-blue-600"></i>
                                    <span>SSL Encrypted</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="ri-shield-check-line text-blue-600"></i>
                                    <span>Secure Payment</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="ri-customer-service-line text-blue-600"></i>
                                    <span>24/7 Support</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="ri-money-back-line text-blue-600"></i>
                                    <span>Money Back</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- eSewa Payment Form (Enhanced Styling, Same Functionality) -->
    <form id="esewa-form" action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST" class="hidden">
        <!-- All hidden fields maintained exactly as before for functionality -->
        <input type="hidden" id="amount" name="amount" value="100" required>
        <input type="hidden" id="tax_amount" name="tax_amount" value="0" required>
        <input type="hidden" id="total_amount" name="total_amount" value="110" required>
        <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="241028" required>
        <input type="hidden" id="product_code" name="product_code" value="EPAYTEST" required>
        <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
        <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
        <input type="hidden" id="success_url" name="success_url" value="{{ route('order.storeEsewa', ['cartid' => $cart->id ?? '']) }}" required>
        <input type="hidden" id="failure_url" name="failure_url" value="{{ route('mycarts') }}" required>
        <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
        <input type="hidden" id="signature" name="signature" value="" required>

        <!-- Enhanced eSewa Button -->
        <button type="submit"
                class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white py-4 px-6 rounded-xl font-semibold text-lg hover:from-green-700 hover:to-emerald-700 transform hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2">
            <i class="ri-secure-payment-line text-xl"></i>
            <span>Pay with eSewa</span>
            <img src="https://esewa.com.np/common/images/esewa_icon.png" alt="eSewa" class="w-6 h-6 ml-2" onerror="this.style.display='none'">
        </button>
    </form>
</div>

    @php
        $total_amount = $cart->product->price * $cart->quantity;
        $transaction_uuid = time();
        $msg = "total_amount=$total_amount,transaction_uuid=$transaction_uuid,product_code=EPAYTEST";
        $secret = "8gBm/:&EnhH.1/q";
        $s = hash_hmac('sha256', $msg, $secret, true);
        $signature = base64_encode($s);
    @endphp

    <script>
        // Set eSewa form values (maintaining exact functionality)
        document.getElementById('amount').value = "{{ $total_amount }}";
        document.getElementById('total_amount').value = "{{ $total_amount }}";
        document.getElementById('transaction_uuid').value = "{{ $transaction_uuid }}";
        document.getElementById('signature').value = "{{ $signature }}";

        // Move the eSewa form dynamically (same as before)
        document.addEventListener('DOMContentLoaded', function() {
            const esewaForm = document.getElementById('esewa-form');
            const esewaContainer = document.getElementById('esewa-form-container');

            if (esewaForm && esewaContainer) {
                // Show the form and append to container
                esewaForm.classList.remove('hidden');
                esewaContainer.appendChild(esewaForm);
            }
        });

        // Handle eSewa form submission (exact same logic preserved)
        document.getElementById('esewa-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Show loading state on eSewa button
            const esewaBtn = this.querySelector('button[type="submit"]');
            const originalText = esewaBtn.innerHTML;
            esewaBtn.innerHTML = '<i class="ri-loader-4-line animate-spin mr-2"></i>Processing Payment...';
            esewaBtn.disabled = true;

            // Get phone and address from the main form (same validation logic)
            const phone = document.querySelector('input[name="phone"]').value;
            const address = document.querySelector('textarea[name="address"]').value;

            if (!phone || !address) {
                // Show enhanced error message
                showErrorMessage('Please fill in your phone number and address before proceeding with eSewa payment.');

                // Reset button
                esewaBtn.innerHTML = originalText;
                esewaBtn.disabled = false;
                return;
            }

            // Store checkout information in session via AJAX (exact same logic)
            fetch('{{ route("order.prepareEsewa") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    phone: phone,
                    address: address
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Now submit the eSewa form (exact same as before)
                    esewaBtn.innerHTML = '<i class="ri-external-link-line mr-2"></i>Redirecting to eSewa...';
                    setTimeout(() => {
                        this.submit();
                    }, 1000);
                } else {
                    showErrorMessage('Error preparing payment. Please try again.');
                    esewaBtn.innerHTML = originalText;
                    esewaBtn.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showErrorMessage('Error preparing payment. Please try again.');
                esewaBtn.innerHTML = originalText;
                esewaBtn.disabled = false;
            });
        });

        // Enhanced error message function
        function showErrorMessage(message) {
            // Remove any existing error messages
            const existingError = document.querySelector('.checkout-error-message');
            if (existingError) {
                existingError.remove();
            }

            // Create new error message
            const errorDiv = document.createElement('div');
            errorDiv.className = 'checkout-error-message fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-6 py-3 rounded-xl shadow-lg z-50 max-w-md';
            errorDiv.innerHTML = `
                <div class="flex items-center">
                    <i class="ri-error-warning-line mr-2 text-xl"></i>
                    <span>${message}</span>
                </div>
            `;

            document.body.appendChild(errorDiv);

            // Auto remove after 5 seconds
            setTimeout(() => {
                if (errorDiv && errorDiv.parentNode) {
                    errorDiv.style.opacity = '0';
                    errorDiv.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        if (errorDiv.parentNode) {
                            errorDiv.parentNode.removeChild(errorDiv);
                        }
                    }, 300);
                }
            }, 5000);
        }

        // Add loading states to COD form
        document.querySelector('form[action="{{ route('order.store') }}"]').addEventListener('submit', function(e) {
            const codBtn = this.querySelector('button[type="submit"]');
            const originalText = codBtn.innerHTML;

            codBtn.innerHTML = '<i class="ri-loader-4-line animate-spin mr-2"></i>Processing Order...';
            codBtn.disabled = true;

            // Allow form to submit naturally
        });

        // Add form validation feedback
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input[required], textarea[required]');

            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.value.trim() === '') {
                        this.classList.add('border-red-300', 'focus:border-red-500', 'focus:ring-red-200');
                        this.classList.remove('border-gray-200', 'focus:border-blue-500', 'focus:ring-blue-200');
                    } else {
                        this.classList.remove('border-red-300', 'focus:border-red-500', 'focus:ring-red-200');
                        this.classList.add('border-gray-200', 'focus:border-blue-500', 'focus:ring-blue-200');
                    }
                });
            });
        });
    </script>
@endsection

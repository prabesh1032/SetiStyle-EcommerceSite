<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SetiStyle</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        .login-bg {
            background: linear-gradient(135deg, #06b6d4 0%, #8b5cf6 100%);
            position: relative;
            overflow: hidden;
        }
        .login-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff08" points="0,1000 1000,0 1000,1000"/></svg>');
            background-size: 100% 100%;
        }
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        .shape {
            position: absolute;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        .shape:nth-child(1) { width: 80px; height: 80px; top: 10%; left: 10%; animation-delay: 0s; }
        .shape:nth-child(2) { width: 60px; height: 60px; top: 70%; left: 80%; animation-delay: 1s; }
        .shape:nth-child(3) { width: 40px; height: 40px; top: 50%; left: 60%; animation-delay: 2s; }
        .shape:nth-child(4) { width: 100px; height: 100px; top: 20%; left: 70%; animation-delay: 3s; }
        .shape:nth-child(5) { width: 50px; height: 50px; top: 80%; left: 20%; animation-delay: 4s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9CA3AF;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .input-field:focus + .input-icon {
            color: #06b6d4;
        }

        .wave-btn {
            position: relative;
            overflow: hidden;
        }

        .wave-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .wave-btn:hover::before {
            left: 100%;
        }

        /* Enhanced Input Animations */
        .input-field {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-field:focus {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(6, 182, 212, 0.15);
        }

        .input-field:focus ~ .input-icon,
        .input-field:not(:placeholder-shown) ~ .input-icon {
            color: #06b6d4;
            transform: translateY(-50%) scale(1.1);
        }

        /* Pulse Animation for Icon */
        @keyframes pulse-icon {
            0%, 100% { transform: translateY(-50%) scale(1); }
            50% { transform: translateY(-50%) scale(1.05); }
        }

        .input-group:focus-within .input-icon {
            animation: pulse-icon 2s infinite;
        }

        /* Enhanced Button Animation */
        .wave-btn:active {
            transform: scale(0.98);
        }

        /* Glass morphism effect enhancement */
        .bg-white {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
        }

        /* Mobile responsive adjustments */
        @media (max-width: 768px) {
            .input-field {
                padding: 16px 16px 16px 56px;
                font-size: 16px;
            }

            .input-icon {
                left: 16px;
                font-size: 18px;
            }

            .float {
                animation-duration: 4s;
            }
        }
    </style>
</head>
<body class="min-h-screen bg-gray-100">
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
        <!-- Left Side - Attractive Background -->
        <div class="login-bg flex items-center justify-center p-8 relative">
            <!-- Floating Shapes -->
            <div class="floating-shapes">
                <div class="shape"></div>
                <div class="shape"></div>
                <div class="shape"></div>
                <div class="shape"></div>
                <div class="shape"></div>
            </div>

            <!-- Welcome Content -->
            <div class="text-center text-white z-10 relative max-w-md">
                <div class="mb-8">
                    <h1 class="text-5xl font-bold mb-4 bg-gradient-to-r from-white to-cyan-100 bg-clip-text text-transparent drop-shadow-lg">
                        SetiStyle
                    </h1>
                    <div class="w-24 h-1 bg-gradient-to-r from-cyan-300 to-purple-300 mx-auto rounded-full mb-6"></div>
                    <h2 class="text-3xl font-semibold mb-4 text-white drop-shadow-md">Welcome Back!</h2>
                    <p class="text-cyan-50 text-lg leading-relaxed drop-shadow-sm">
                        Discover amazing products and exclusive deals. Your journey to style begins here.
                    </p>
                </div>

                <!-- Feature Icons -->
                <div class="grid grid-cols-3 gap-6 mt-8">
                    <div class="text-center">
                        <div class="glass-effect w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="ri-shopping-bag-3-line text-2xl"></i>
                        </div>
                        <p class="text-sm text-cyan-50 drop-shadow-sm">Quality Products</p>
                    </div>
                    <div class="text-center">
                        <div class="glass-effect w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="ri-truck-line text-2xl"></i>
                        </div>
                        <p class="text-sm text-cyan-50 drop-shadow-sm">Fast Delivery</p>
                    </div>
                    <div class="text-center">
                        <div class="glass-effect w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="ri-shield-check-line text-2xl"></i>
                        </div>
                        <p class="text-sm text-cyan-50 drop-shadow-sm">Secure Shopping</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Side - Login Form -->
        <div class="flex items-center justify-center bg-gradient-to-br from-gray-50 to-white p-8">
            <div class="w-full max-w-md">
                <!-- Login Card -->
                <div class="bg-white p-8 rounded-3xl shadow-2xl border border-gray-100 relative overflow-hidden">
                    <!-- Decorative Elements -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-cyan-500/10 to-purple-500/10 rounded-full -translate-y-16 translate-x-16"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-purple-500/10 to-cyan-500/10 rounded-full translate-y-12 -translate-x-12"></div>

                    <div class="relative z-10">
                        <!-- Header -->
                        <div class="text-center mb-8">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-2xl mb-4 shadow-lg">
                                <i class="ri-user-line text-2xl text-white"></i>
                            </div>
                            <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent mb-2">
                                Sign In
                            </h1>
                            <p class="text-gray-600">Access your account to continue shopping</p>
                        </div>

                        <!-- Login Form -->
                        <form action="{{route('login')}}" method="POST" class="space-y-6">
                            @csrf

                            <!-- Email Input -->
                            <div class="input-group">
                                <input type="email"
                                       name="email"
                                       placeholder="Email Address"
                                       class="input-field w-full pl-14 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:bg-white focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition-all duration-300 text-gray-800 placeholder-gray-500"
                                       required>
                                <i class="ri-mail-line input-icon"></i>
                                @error('email')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="ri-error-warning-line mr-1"></i>{{$message}}
                                </p>
                                @enderror
                            </div>

                            <!-- Password Input -->
                            <div class="input-group">
                                <input type="password"
                                       name="password"
                                       placeholder="Password"
                                       class="input-field w-full pl-14 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:bg-white focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition-all duration-300 text-gray-800 placeholder-gray-500"
                                       required>
                                <i class="ri-lock-line input-icon"></i>
                                @error('password')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="ri-error-warning-line mr-1"></i>{{$message}}
                                </p>
                                @enderror
                            </div>

                            <!-- Forgot Password -->
                            <div class="text-right">
                                <a href="{{route('password.request')}}"
                                   class="text-cyan-600 hover:text-cyan-800 text-sm font-medium transition-colors duration-300 hover:underline">
                                    <i class="ri-lock-unlock-line mr-1"></i>Forgot Password?
                                </a>
                            </div>

                            <!-- Sign In Button -->
                            <button type="submit"
                                    class="wave-btn w-full bg-gradient-to-r from-cyan-600 to-purple-600 text-white py-4 rounded-2xl font-semibold text-lg shadow-xl hover:shadow-2xl hover:from-cyan-700 hover:to-purple-700 transform hover:scale-[1.02] transition-all duration-300">
                                <i class="ri-login-circle-line mr-2"></i>Sign In
                            </button>
                        </form>

                        <!-- Divider -->
                        <div class="flex items-center my-8">
                            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
                            <span class="px-4 text-gray-500 text-sm">or</span>
                            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center">
                            <div class="bg-gradient-to-r from-cyan-50 to-purple-50 p-6 rounded-2xl border border-cyan-100">
                                <p class="text-gray-700 mb-3">
                                    <i class="ri-user-add-line mr-2 text-cyan-600"></i>
                                    New to SetiStyle?
                                </p>
                                <a href="{{route('register')}}"
                                   class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-semibold rounded-xl hover:from-emerald-600 hover:to-teal-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                                    <i class="ri-user-add-line mr-2"></i>
                                    Create Account
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center mt-8 text-gray-500 text-sm">
                    <p>&copy; 2024 SetiStyle. Secure & Trusted Shopping Experience.</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

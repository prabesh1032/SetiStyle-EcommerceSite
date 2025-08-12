<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SetiStyle</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        .register-bg {
            background: linear-gradient(135deg, #06b6d4 0%, #8b5cf6 100%);
            position: relative;
            overflow: hidden;
        }
        .register-bg::before {
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
        .shape:nth-child(6) { width: 70px; height: 70px; top: 30%; left: 30%; animation-delay: 5s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        /* Mobile responsive adjustments */
        @media (max-width: 768px) {
            .float {
                animation-duration: 4s;
            }
        }
    </style>
</head>
<body class="min-h-screen bg-gray-100">
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
        <!-- Left Side - Attractive Background -->
        <div class="register-bg flex items-center justify-center p-8 relative">
            <!-- Floating Shapes -->
            <div class="floating-shapes">
                <div class="shape"></div>
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
                    <h2 class="text-3xl font-semibold mb-4 text-white drop-shadow-md">Join Our Community!</h2>
                    <p class="text-cyan-50 text-lg leading-relaxed drop-shadow-sm">
                        Create your account and start exploring amazing deals, exclusive products and premium shopping experience.
                    </p>
                </div>

                <!-- Feature Icons -->
                <div class="grid grid-cols-3 gap-6 mt-8">
                    <div class="text-center">
                        <div class="glass-effect w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="ri-user-star-line text-2xl"></i>
                        </div>
                        <p class="text-sm text-cyan-50 drop-shadow-sm">Premium Member</p>
                    </div>
                    <div class="text-center">
                        <div class="glass-effect w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="ri-gift-line text-2xl"></i>
                        </div>
                        <p class="text-sm text-cyan-50 drop-shadow-sm">Exclusive Offers</p>
                    </div>
                    <div class="text-center">
                        <div class="glass-effect w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="ri-heart-3-line text-2xl"></i>
                        </div>
                        <p class="text-sm text-cyan-50 drop-shadow-sm">Wishlist & More</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Register Form -->
        <div class="flex items-center justify-center bg-gradient-to-br from-gray-50 to-white p-8">
            <div class="w-full max-w-md">
                <div class="bg-white p-8 rounded-3xl shadow-2xl border border-gray-100">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-2xl mb-4 shadow-lg">
                            <i class="ri-user-add-line text-2xl text-white"></i>
                        </div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent mb-2">
                            Create Account
                        </h1>
                        <p class="text-gray-600">Join SetiStyle and start your shopping journey</p>
                    </div>

                    <!-- Register Form -->
                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a class="underline text-sm text-cyan-600 hover:text-cyan-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-colors duration-300" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>

                <!-- Footer -->
                <div class="text-center mt-8 text-gray-500 text-sm">
                    <p>&copy; 2024 SetiStyle. Start Your Style Journey Today.</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SetiStyle</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Ensure mobile menu is properly displayed */
        #mobile-menu {
            transition: all 0.3s ease-in-out;
            z-index: 1000 !important;
        }
        #mobile-menu.hidden {
            display: none !important;
            opacity: 0;
        }
        #mobile-menu:not(.hidden) {
            display: block !important;
            opacity: 1;
        }
        /* Make mobile menu button more prominent for testing */
        #mobile-menu-button {
            background-color: rgba(255, 255, 255, 0.2) !important;
            border: 2px solid #333 !important;
            z-index: 1001 !important;
        }
        #mobile-menu-button:hover {
            background-color: rgba(255, 255, 255, 0.4) !important;
        }
        /* Ensure navbar has proper z-index */
        nav {
            z-index: 999 !important;
        }
        /* Make sure mobile menu links are clickable */
        #mobile-menu a {
            position: relative;
            z-index: 1002;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">
    @include('Layouts.alert')
    <!-- Top Bar -->
    <div class="bg-gradient-to-r from-cyan-600 to-purple-600 text-white py-3 md:py-4 shadow-lg">
        <div class="flex justify-between items-center px-4 md:px-20 gap-4">
            <!-- Left Side - Contact Info with Icon -->
            <div class="flex items-center space-x-3">
                <div class="bg-white/20 backdrop-blur-sm rounded-full p-2 hover:bg-white/30 transition-all duration-300">
                    <i class="ri-phone-line text-lg md:text-xl text-white"></i>
                </div>
                <div class="hidden sm:block">
                    <p class="text-xs md:text-sm text-white/80 font-medium">Call Us</p>
                    <a href="tel:9812965119" class="text-sm md:text-base font-semibold text-white hover:text-cyan-200 transition-colors duration-300">
                        +977 9812965119
                    </a>
                </div>
            </div>

            <!-- Center - Tagline -->
            <div class="hidden lg:block">
                <p class="text-center text-sm md:text-base font-semibold text-white/90 tracking-wide">
                    ✨ Your Style, Your Statement ✨
                </p>
            </div>

            <!-- Right Side - User Actions -->
            <div class="flex items-center space-x-1 md:space-x-2">
                @auth
                    <!-- User Profile -->
                    <a href="{{ route('profile.edit') }}" class="hidden md:flex items-center space-x-2 px-3 py-2 rounded-full bg-white/10 backdrop-blur-sm hover:bg-white/20 transition-all duration-300 group">
                        <i class="ri-user-fill text-lg text-cyan-200 group-hover:text-cyan-100"></i>
                        <span class="text-sm font-semibold text-white group-hover:text-cyan-100">{{ auth()->user()->name }}</span>
                    </a>

                    <!-- Cart with Badge -->
                    <div class="relative inline-block group">
                        <a href="{{ route('mycarts') }}" class="p-2 md:p-3 rounded-full bg-white/10 backdrop-blur-sm hover:bg-white/20 transition-all duration-300 flex items-center justify-center {{ request()->routeIs('mycarts') ? 'bg-white/30' : '' }}">
                            <i class="ri-shopping-cart-2-line text-lg md:text-xl text-white"></i>
                            <span class="hidden sm:inline text-sm font-semibold ml-2 text-white">Cart</span>
                        </a>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full text-xs w-6 h-6 flex items-center justify-center font-bold shadow-lg animate-pulse">
                            @php
                                $no_of_items = \App\Models\Cart::where('user_id', auth()->id())->count();
                            @endphp
                            {{ $no_of_items }}
                        </span>
                        <!-- Tooltip -->
                        <div class="absolute bottom-full mb-2 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs py-1 px-3 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                            My Cart ({{ $no_of_items }})
                        </div>
                    </div>

                    <!-- Logout -->
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit" class="p-2 md:p-3 rounded-full bg-white/10 backdrop-blur-sm hover:bg-red-500/40 transition-all duration-300 text-white hover:text-white flex items-center justify-center">
                            <i class="ri-logout-box-line text-lg md:text-xl"></i>
                            <span class="hidden sm:inline text-sm font-semibold ml-2">Logout</span>
                        </button>
                    </form>
                @else
                    <!-- Login Button -->
                    <a href="/login" class="p-2 md:p-3 rounded-full bg-white/20 backdrop-blur-sm hover:bg-white/30 transition-all duration-300 text-white font-semibold flex items-center justify-center space-x-2">
                        <i class="ri-login-box-line text-lg md:text-xl"></i>
                        <span class="hidden sm:inline text-sm">Login</span>
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="bg-cyan-300 shadow-lg sticky top-0 z-50">
        <div class="flex justify-between items-center px-4 md:px-10 py-4 md:py-5 gap-4">
            <!-- Brand Text with Cool Effects -->
            <div>
                <a href="{{ route('home') }}" id="brand-logo" class="relative inline-block group overflow-hidden">
                    <span class="relative z-10 text-2xl md:text-3xl font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent hover:from-purple-600 hover:via-pink-600 hover:to-red-600 transition-all duration-500 transform hover:scale-105 cursor-pointer select-none">
                        SetiStyle
                    </span>
                    <!-- Animated underline -->
                    <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-purple-500 group-hover:w-full transition-all duration-500"></div>
                    <!-- Glow effect -->
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-20 transition-opacity duration-300 z-0">
                        <span class="text-2xl md:text-3xl font-bold text-blue-400 blur-md absolute inset-0">
                            SetiStyle
                        </span>
                    </div>
                    <!-- Shimmer effect -->
                    <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/20 to-transparent skew-x-12"></div>
                </a>
            </div>

            <!-- Search Bar -->
            <form action="{{ route('search') }}" method="GET" class="hidden md:flex items-center flex-1 max-w-md mx-4">
                <div class="relative w-full">
                    <input
                        type="text"
                        name="qry"
                        placeholder="Search products..."
                        class="w-full px-4 py-2 md:py-2.5 rounded-full border-2 border-cyan-400 focus:border-cyan-600 focus:outline-none bg-white/90 backdrop-blur-sm transition-all duration-300 shadow-md hover:shadow-lg focus:shadow-lg"
                        autocomplete="off"
                    >
                    <button
                        type="submit"
                        class="absolute right-1 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-full p-2 hover:shadow-lg transition-all duration-300 hover:scale-110"
                    >
                        <i class="ri-search-line text-lg"></i>
                    </button>
                </div>
            </form>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden flex items-center justify-center p-3 rounded-lg hover:bg-cyan-400 transition-colors z-50 relative">
                <i class="ri-menu-line text-2xl text-gray-700"></i>
            </button>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex space-x-1">
                {{-- <a href="{{ route('home') }}" class="text-lg lg:text-xl font-semibold flex items-center space-x-2 p-3 rounded-lg transition-all duration-300 {{ request()->routeIs('home') ? 'text-blue-600' : 'hover:text-blue-500' }}">
                    <i class="ri-home-2-line"></i> <span>Home</span>
                </a> --}}
                @php
                    $categories = App\Models\Category::orderBy('priority')->limit(5)->get();
                @endphp
                @foreach($categories as $category)
                    <a href="{{ route('categoryproduct', $category->id) }}" class="text-lg lg:text-xl font-semibold flex items-center space-x-2 p-3 rounded-lg transition-all duration-300 {{ request()->routeIs('categoryproduct') && request()->route('id') == $category->id ? 'text-blue-600' : 'hover:text-blue-500' }}">
                        <i class="ri-shopping-bag-3-line"></i> <span>{{ $category->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="md:hidden hidden bg-cyan-400 px-4 pb-4 relative z-40 w-full">
            <!-- Mobile Search -->
            <form action="{{ route('search') }}" method="GET" class="mb-4">
                <div class="relative w-full">
                    <input
                        type="text"
                        name="qry"
                        placeholder="Search products..."
                        class="w-full px-4 py-2 rounded-full border-2 border-cyan-500 focus:border-cyan-700 focus:outline-none bg-white transition-all duration-300 shadow-md"
                        autocomplete="off"
                    >
                    <button
                        type="submit"
                        class="absolute right-1 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-full p-2 hover:scale-110 transition-transform duration-300"
                    >
                        <i class="ri-search-line text-lg"></i>
                    </button>
                </div>
            </form>
            <div class="space-y-2 pt-2">
                <a href="{{ route('home') }}" class="block text-lg font-semibold p-3 rounded-lg transition-all duration-300 text-gray-700 {{ request()->routeIs('home') ? 'text-blue-600 bg-cyan-300' : 'hover:text-blue-500 hover:bg-cyan-300' }}">
                    <i class="ri-home-2-line mr-2"></i>Home
                </a>
                @php
                    $categories = App\Models\Category::orderBy('priority')->limit(5)->get();
                @endphp
                @foreach($categories as $category)
                    <a href="{{ route('categoryproduct', $category->id) }}" class="block text-lg font-semibold p-3 rounded-lg transition-all duration-300 text-gray-700 {{ request()->routeIs('categoryproduct') && request()->route('id') == $category->id ? 'text-blue-600 bg-cyan-300' : 'hover:text-blue-500 hover:bg-cyan-300' }}">
                        <i class="ri-shopping-bag-3-line mr-2"></i>{{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 md:py-12">
        <div class="container mx-auto px-4 md:px-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                <div class="space-y-4 text-center md:text-left">
                    <h3 class="text-lg md:text-xl font-semibold mb-4">SetiStyle</h3>
                    <p class="text-gray-300 text-sm md:text-base">Your trusted partner for quality products and excellent service.</p>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <a href="#" class="hover:text-blue-400 transition-colors"><i class="ri-facebook-fill text-lg md:text-xl"></i></a>
                        <a href="#" class="hover:text-blue-400 transition-colors"><i class="ri-twitter-fill text-lg md:text-xl"></i></a>
                        <a href="#" class="hover:text-blue-400 transition-colors"><i class="ri-instagram-fill text-lg md:text-xl"></i></a>
                    </div>
                </div>

                <div class="space-y-4 text-center md:text-left">
                    <h3 class="text-lg md:text-xl font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="hover:text-blue-400 transition-colors text-sm md:text-base">Home</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition-colors text-sm md:text-base">About Us</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition-colors text-sm md:text-base">Contact</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition-colors text-sm md:text-base">Privacy Policy</a></li>
                    </ul>
                </div>

                <div class="space-y-4 text-center md:text-left">
                    <h3 class="text-lg md:text-xl font-semibold mb-4">Contact Info</h3>
                    <ul class="space-y-2 text-gray-300 text-sm md:text-base">
                        <li><i class="ri-phone-fill mr-2"></i> 9812965119</li>
                        <li><i class="ri-mail-fill mr-2"></i> info@setistyle.com</li>
                        <li><i class="ri-map-pin-fill mr-2"></i> Lalitpur, Nepal</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-6 md:mt-8 pt-6 md:pt-8 text-center">
                <p class="text-gray-400 text-xs md:text-sm">&copy; 2024 SetiStyle. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu JavaScript -->
    <script>
        // Wait for DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing mobile menu...');

            // Mobile Menu Functionality
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            console.log('Button found:', !!mobileMenuButton);
            console.log('Menu found:', !!mobileMenu);

            if (mobileMenuButton && mobileMenu) {
                const menuIcon = mobileMenuButton.querySelector('i');
                console.log('Icon found:', !!menuIcon);

                // Simple toggle function
                function toggleMobileMenu() {
                    console.log('Toggling menu...');

                    if (mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.remove('hidden');
                        mobileMenu.style.display = 'block';
                        if (menuIcon) menuIcon.className = 'ri-close-line text-2xl text-gray-700';
                        console.log('Menu opened');
                    } else {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.style.display = 'none';
                        if (menuIcon) menuIcon.className = 'ri-menu-line text-2xl text-gray-700';
                        console.log('Menu closed');
                    }
                }

                // Add event listeners
                mobileMenuButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    console.log('Button clicked!');
                    toggleMobileMenu();
                });

                // Also try with touchstart for mobile
                mobileMenuButton.addEventListener('touchstart', function(e) {
                    e.preventDefault();
                    console.log('Button touched!');
                    toggleMobileMenu();
                }, { passive: false });

                // Close menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.style.display = 'none';
                        if (menuIcon) menuIcon.className = 'ri-menu-line text-2xl text-gray-700';
                    }
                });

                // Close menu on resize
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 768) {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.style.display = 'none';
                        if (menuIcon) menuIcon.className = 'ri-menu-line text-2xl text-gray-700';
                    }
                });

                console.log('Mobile menu initialized successfully!');
            } else {
                console.error('Mobile menu elements not found!');
                console.log('Available elements with mobile-menu id:', document.querySelectorAll('[id*="mobile"]'));
            }

            // Cool SetiStyle Brand Animation
            const brandLogo = document.getElementById('brand-logo');
            const brandText = brandLogo.querySelector('span');

            // Create floating particles effect
            function createParticle() {
                const particle = document.createElement('div');
                particle.className = 'absolute w-1 h-1 bg-blue-400 rounded-full pointer-events-none';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = '100%';
                particle.style.animation = 'floatUp 2s ease-out forwards';
                brandLogo.appendChild(particle);

                setTimeout(() => {
                    if (particle.parentNode) {
                        particle.parentNode.removeChild(particle);
                    }
                }, 2000);
            }

            // Add CSS for particle animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes floatUp {
                    0% {
                        opacity: 1;
                        transform: translateY(0px) scale(0);
                    }
                    50% {
                        opacity: 0.7;
                        transform: translateY(-20px) scale(1);
                    }
                    100% {
                        opacity: 0;
                        transform: translateY(-40px) scale(0);
                    }
                }

                @keyframes pulse {
                    0%, 100% {
                        transform: scale(1);
                    }
                    50% {
                        transform: scale(1.05);
                    }
                }

                .brand-pulse {
                    animation: pulse 2s infinite;
                }

                @keyframes rainbow {
                    0% { background-position: 0% 50%; }
                    50% { background-position: 100% 50%; }
                    100% { background-position: 0% 50%; }
                }

                .rainbow-text {
                    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
                    background-size: 400% 400%;
                    animation: rainbow 3s ease infinite;
                    -webkit-background-clip: text;
                    background-clip: text;
                    -webkit-text-fill-color: transparent;
                }
            `;
            document.head.appendChild(style);

            // Add hover effects
            brandLogo.addEventListener('mouseenter', function() {
                brandText.classList.add('rainbow-text');
                // Create particles on hover
                for (let i = 0; i < 5; i++) {
                    setTimeout(() => createParticle(), i * 100);
                }
            });

            brandLogo.addEventListener('mouseleave', function() {
                setTimeout(() => {
                    brandText.classList.remove('rainbow-text');
                }, 1000);
            });

            // Add periodic pulse effect
            setInterval(() => {
                brandText.classList.add('brand-pulse');
                setTimeout(() => {
                    brandText.classList.remove('brand-pulse');
                }, 2000);
            }, 10000);

            // Add click ripple effect
            brandLogo.addEventListener('click', function(e) {
                const ripple = document.createElement('div');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.className = 'absolute rounded-full bg-white opacity-30 pointer-events-none animate-ping';

                this.appendChild(ripple);

                setTimeout(() => {
                    if (ripple.parentNode) {
                        ripple.parentNode.removeChild(ripple);
                    }
                }, 600);
            });
        });
    </script>
</body>
</html>

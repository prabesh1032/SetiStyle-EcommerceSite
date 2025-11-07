@extends('layouts.master')

@section('title', 'My Profile')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8 md:py-12">
    <div class="container mx-auto px-4 md:px-10">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-cyan-600 to-purple-600 bg-clip-text text-transparent mb-2">
                        My Profile
                    </h1>
                    <p class="text-gray-600 text-lg">Manage your account information</p>
                </div>
                <div class="hidden md:flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-r from-cyan-500 to-purple-600 shadow-lg">
                    <i class="ri-user-line text-4xl text-white"></i>
                </div>
            </div>
        </div>

        <!-- Main Profile Card -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Sidebar - Profile Info Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden sticky top-24">
                    <!-- Profile Header -->
                    <div class="bg-gradient-to-r from-cyan-500 to-purple-600 p-6 text-center text-white">
                        <div class="flex items-center justify-center w-24 h-24 rounded-full bg-white/20 backdrop-blur-sm mx-auto mb-4 shadow-lg">
                            <i class="ri-user-fill text-5xl text-white"></i>
                        </div>
                        <h2 class="text-2xl font-bold mb-1">{{ auth()->user()->name }}</h2>
                        <p class="text-cyan-100 text-sm">Member Account</p>
                    </div>

                    <!-- Profile Stats -->
                    <div class="p-6 border-b border-gray-200">
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-cyan-100 flex items-center justify-center">
                                    <i class="ri-mail-line text-cyan-600 text-lg"></i>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm font-medium">Email</p>
                                    <p class="text-gray-900 font-semibold break-all">{{ auth()->user()->email }}</p>
                                </div>
                            </div>

                            @if(auth()->user()->phone)
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center">
                                    <i class="ri-phone-line text-purple-600 text-lg"></i>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm font-medium">Phone</p>
                                    <p class="text-gray-900 font-semibold">{{ auth()->user()->phone }}</p>
                                </div>
                            </div>
                            @endif

                            @if(auth()->user()->address)
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center">
                                    <i class="ri-map-pin-line text-pink-600 text-lg"></i>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm font-medium">Address</p>
                                    <p class="text-gray-900 font-semibold">{{ auth()->user()->address }}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="p-6 space-y-3">
                        <button
                            type="button"
                            onclick="goBackAndRefresh()"
                            class="w-full flex items-center justify-center space-x-2 px-4 py-3 rounded-lg bg-gray-100 text-gray-800 hover:bg-gray-200 transition-all duration-300 font-semibold"
                        >
                            <i class="ri-arrow-left-line"></i>
                            <span>Back</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Content - Edit Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Edit Your Information</h3>
                        <p class="text-gray-600">Update your profile details below</p>
                    </div>

                    <!-- Edit Profile Form -->
                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">
                                <i class="ri-user-line text-cyan-600 mr-2"></i>Full Name
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', auth()->user()->name) }}"
                                class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 outline-none transition-all duration-300 text-gray-900"
                                placeholder="Enter your full name"
                                required
                            >
                            @error('name')
                                <p class="text-red-500 text-sm mt-2 flex items-center"><i class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">
                                <i class="ri-mail-line text-cyan-600 mr-2"></i>Email Address
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email', auth()->user()->email) }}"
                                class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 outline-none transition-all duration-300 text-gray-900"
                                placeholder="Enter your email"
                                required
                            >
                            @error('email')
                                <p class="text-red-500 text-sm mt-2 flex items-center"><i class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone Field -->
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-900 mb-2">
                                <i class="ri-phone-line text-purple-600 mr-2"></i>Phone Number
                            </label>
                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ old('phone', auth()->user()->phone) }}"
                                class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition-all duration-300 text-gray-900"
                                placeholder="+977 9812345678"
                            >
                            @error('phone')
                                <p class="text-red-500 text-sm mt-2 flex items-center"><i class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Address Field -->
                        <div>
                            <label for="address" class="block text-sm font-semibold text-gray-900 mb-2">
                                <i class="ri-map-pin-line text-pink-600 mr-2"></i>Address
                            </label>
                            <textarea
                                id="address"
                                name="address"
                                rows="4"
                                class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 outline-none transition-all duration-300 text-gray-900 resize-none"
                                placeholder="Enter your full address"
                            >{{ old('address', auth()->user()->address) }}</textarea>
                            @error('address')
                                <p class="text-red-500 text-sm mt-2 flex items-center"><i class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                            <button
                                type="button"
                                onclick="goBackAndRefresh()"
                                class="px-6 py-3 rounded-lg bg-gray-100 text-gray-800 hover:bg-gray-200 transition-all duration-300 font-semibold flex items-center space-x-2"
                            >
                                <i class="ri-arrow-left-line"></i>
                                <span>Back</span>
                            </button>
                            <button
                                type="submit"
                                class="px-8 py-3 rounded-lg bg-gradient-to-r from-cyan-500 to-purple-600 text-white hover:shadow-lg hover:scale-105 transition-all duration-300 font-semibold flex items-center space-x-2"
                            >
                                <i class="ri-save-line"></i>
                                <span>Save Changes</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Additional Info Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                    <!-- Member Since -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 border border-blue-200">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-blue-600 text-sm font-semibold mb-1">Member Since</p>
                                <p class="text-2xl font-bold text-blue-900">{{ auth()->user()->created_at->format('M d, Y') }}</p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-blue-300/30 flex items-center justify-center">
                                <i class="ri-calendar-line text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Account Status -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 border border-green-200">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-green-600 text-sm font-semibold mb-1">Account Status</p>
                                <p class="text-2xl font-bold text-green-900">Active</p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-green-300/30 flex items-center justify-center">
                                <i class="ri-check-circle-line text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .bg-white {
        animation: slideIn 0.5s ease-out;
    }
</style>

<script>
    function goBackAndRefresh() {
        // Set a flag in sessionStorage to indicate we're coming back
        sessionStorage.setItem('profileUpdated', 'true');

        // Go back to previous page
        window.history.back();
    }
</script>
@endsection

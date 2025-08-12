@if(Session::has('success'))
<div class="fixed top-4 right-4 bg-white px-6 py-4 rounded-2xl shadow-2xl border border-green-200 z-50 max-w-sm transform transition-all duration-500 ease-out animate-slide-in" id="successAlert">
    <div class="flex items-start space-x-4">
        <div class="flex-shrink-0">
            <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center shadow-lg">
                <i class="ri-check-line text-white text-xl"></i>
            </div>
        </div>
        <div class="flex-1">
            <div class="flex items-center justify-between mb-1">
                <h4 class="text-sm font-semibold text-gray-900">Success!</h4>
                <button onclick="closeAlert('successAlert')" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                    <i class="ri-close-line text-lg"></i>
                </button>
            </div>
            <p class="text-sm text-gray-600 leading-relaxed">{{session('success')}}</p>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-green-500 to-emerald-600 rounded-b-2xl animate-progress"></div>
</div>

<style>
@keyframes slide-in {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slide-out {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(100%);
        opacity: 0;
    }
}

@keyframes progress {
    from {
        width: 100%;
    }
    to {
        width: 0%;
    }
}

.animate-slide-in {
    animation: slide-in 0.5s ease-out;
}

.animate-slide-out {
    animation: slide-out 0.4s ease-in forwards;
}

.animate-progress {
    animation: progress 4s linear;
}
</style>

<script>
    // Auto close after 4 seconds
    setTimeout(function() {
        const alert = document.getElementById('successAlert');
        if (alert) {
            alert.classList.add('animate-slide-out');
            setTimeout(() => {
                alert.style.display = 'none';
            }, 400);
        }
    }, 4000);

    // Close function
    function closeAlert(id) {
        const alert = document.getElementById(id);
        if (alert) {
            alert.classList.add('animate-slide-out');
            setTimeout(() => {
                alert.style.display = 'none';
            }, 400);
        }
    }
</script>
@endif

@if(Session::has('error'))
<div class="fixed top-4 right-4 bg-white px-6 py-4 rounded-2xl shadow-2xl border border-red-200 z-50 max-w-sm transform transition-all duration-500 ease-out animate-slide-in" id="errorAlert">
    <div class="flex items-start space-x-4">
        <div class="flex-shrink-0">
            <div class="w-10 h-10 bg-gradient-to-r from-red-500 to-rose-600 rounded-full flex items-center justify-center shadow-lg">
                <i class="ri-error-warning-line text-white text-xl"></i>
            </div>
        </div>
        <div class="flex-1">
            <div class="flex items-center justify-between mb-1">
                <h4 class="text-sm font-semibold text-gray-900">Error!</h4>
                <button onclick="closeAlert('errorAlert')" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                    <i class="ri-close-line text-lg"></i>
                </button>
            </div>
            <p class="text-sm text-gray-600 leading-relaxed">{{session('error')}}</p>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-red-500 to-rose-600 rounded-b-2xl animate-progress"></div>
</div>

<script>
    // Auto close after 4 seconds
    setTimeout(function() {
        const alert = document.getElementById('errorAlert');
        if (alert) {
            alert.classList.add('animate-slide-out');
            setTimeout(() => {
                alert.style.display = 'none';
            }, 400);
        }
    }, 4000);
</script>
@endif

@if(Session::has('info'))
<div class="fixed top-4 right-4 bg-white px-6 py-4 rounded-2xl shadow-2xl border border-cyan-200 z-50 max-w-sm transform transition-all duration-500 ease-out animate-slide-in" id="infoAlert">
    <div class="flex items-start space-x-4">
        <div class="flex-shrink-0">
            <div class="w-10 h-10 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-full flex items-center justify-center shadow-lg">
                <i class="ri-information-line text-white text-xl"></i>
            </div>
        </div>
        <div class="flex-1">
            <div class="flex items-center justify-between mb-1">
                <h4 class="text-sm font-semibold text-gray-900">Info</h4>
                <button onclick="closeAlert('infoAlert')" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                    <i class="ri-close-line text-lg"></i>
                </button>
            </div>
            <p class="text-sm text-gray-600 leading-relaxed">{{session('info')}}</p>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-b-2xl animate-progress"></div>
</div>

<script>
    // Auto close after 4 seconds
    setTimeout(function() {
        const alert = document.getElementById('infoAlert');
        if (alert) {
            alert.classList.add('animate-slide-out');
            setTimeout(() => {
                alert.style.display = 'none';
            }, 400);
        }
    }, 4000);
</script>
@endif

@if(Session::has('warning'))
<div class="fixed top-4 right-4 bg-white px-6 py-4 rounded-2xl shadow-2xl border border-yellow-200 z-50 max-w-sm transform transition-all duration-500 ease-out animate-slide-in" id="warningAlert">
    <div class="flex items-start space-x-4">
        <div class="flex-shrink-0">
            <div class="w-10 h-10 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-full flex items-center justify-center shadow-lg">
                <i class="ri-alert-line text-white text-xl"></i>
            </div>
        </div>
        <div class="flex-1">
            <div class="flex items-center justify-between mb-1">
                <h4 class="text-sm font-semibold text-gray-900">Warning!</h4>
                <button onclick="closeAlert('warningAlert')" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                    <i class="ri-close-line text-lg"></i>
                </button>
            </div>
            <p class="text-sm text-gray-600 leading-relaxed">{{session('warning')}}</p>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-b-2xl animate-progress"></div>
</div>

<script>
    // Auto close after 4 seconds
    setTimeout(function() {
        const alert = document.getElementById('warningAlert');
        if (alert) {
            alert.classList.add('animate-slide-out');
            setTimeout(() => {
                alert.style.display = 'none';
            }, 400);
        }
    }, 4000);
</script>
@endif

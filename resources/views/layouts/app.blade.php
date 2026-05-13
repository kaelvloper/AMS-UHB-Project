<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" x-bind:class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AMS-UHB | {{ $title ?? 'Dashboard' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js & Lucide Icons -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased dark:bg-gray-900 dark:text-white" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar Backdrop -->
        <div x-show="sidebarOpen" class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden" @click="sidebarOpen = false" x-transition></div>

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 transform bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-0 shadow-lg glassmorphism">
            <div class="flex items-center justify-center h-16 border-b border-gray-200 dark:border-gray-700">
                <span class="text-2xl font-bold text-blue-800 dark:text-blue-400">AMS-UHB</span>
            </div>

            <nav class="p-4 space-y-1 overflow-y-auto h-[calc(100vh-4rem)]">
                @php
                    $menus = [
                        ['name' => 'Manajemen KJM', 'route' => 'kjm.index', 'icon' => 'file-text'],
                    ];
                @endphp

                @foreach ($menus as $menu)
                    @php 
                        $isActive = request()->routeIs($menu['route']); 
                        $url = route($menu['route']);
                    @endphp
                    <a href="{{ $url }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ $isActive ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/50 dark:text-blue-400' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                        <i data-lucide="{{ $menu['icon'] }}" class="w-5 h-5 mr-3"></i>
                        {{ $menu['name'] }}
                    </a>
                @endforeach
            </nav>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex flex-col flex-1 overflow-hidden">
            
            <!-- Navbar -->
            <header class="flex items-center justify-between h-16 px-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 shadow-sm z-10">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                    <div class="hidden lg:block ml-4">
                        <div class="relative">
                            <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                            <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all w-64">
                        </div>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Clock -->
                    <div class="hidden md:block text-sm font-medium text-gray-600 dark:text-gray-300" x-data="{ time: '' }" x-init="setInterval(() => { time = new Date().toLocaleTimeString('id-ID') }, 1000)">
                        <span x-text="time"></span>
                    </div>

                    <!-- Dark Mode Toggle -->
                    <button @click="darkMode = !darkMode" class="p-2 text-gray-500 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 focus:outline-none">
                        <i data-lucide="sun" x-show="darkMode" class="w-5 h-5" style="display: none;"></i>
                        <i data-lucide="moon" x-show="!darkMode" class="w-5 h-5"></i>
                    </button>

                    <!-- Profile Dropdown -->
                    <div class="relative" x-data="{ profileOpen: false }">
                        <button @click="profileOpen = !profileOpen" @click.away="profileOpen = false" class="flex items-center focus:outline-none">
                            <img class="w-8 h-8 rounded-full border border-gray-300 dark:border-gray-600" src="https://ui-avatars.com/api/?name=Admin+UHB&background=1e3a8a&color=fff" alt="User avatar">
                        </button>
                        
                        <div x-show="profileOpen" x-transition class="absolute right-0 w-48 mt-2 py-2 bg-white dark:bg-gray-800 rounded-md shadow-xl z-20 border border-gray-100 dark:border-gray-700">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Settings</a>
                            <hr class="my-1 border-gray-200 dark:border-gray-700">
                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700">Logout</a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 dark:bg-gray-900">
                <div class="container mx-auto px-6 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Toast Notification -->
    @if(session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center z-50 transition-opacity" x-transition>
        <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    <script>
        lucide.createIcons();
    </script>
</body>
</html>

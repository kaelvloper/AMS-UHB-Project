<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <!-- Toast Notifications -->
        <div 
            x-data="{ 
                show: false, 
                message: '', 
                type: 'success',
                showToast(event) {
                    this.message = event.detail[0].message;
                    this.type = event.detail[0].type || 'success';
                    this.show = true;
                    setTimeout(() => { this.show = false }, 3000);
                }
            }"
            @toast.window="showToast($event)"
            x-show="show"
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed bottom-5 right-5 z-[100] max-w-sm w-full bg-white shadow-2xl rounded-2xl pointer-events-auto overflow-hidden border border-gray-100"
            style="display: none;"
        >
            <div class="p-4 flex items-center">
                <div class="flex-shrink-0">
                    <template x-if="type === 'success'">
                        <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </template>
                    <template x-if="type === 'error'">
                        <svg class="h-6 w-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </template>
                </div>
                <div class="ml-3 flex-1">
                    <p x-text="message" class="text-sm font-black text-blue-900 uppercase tracking-widest"></p>
                </div>
            </div>
            <div class="h-1 bg-gray-100 w-full">
                <div 
                    class="h-full transition-all duration-[3000ms] ease-linear" 
                    :class="type === 'success' ? 'bg-green-500' : 'bg-red-500'"
                    :style="show ? 'width: 100%' : 'width: 0%'"
                ></div>
            </div>
        </div>
    </body>
</html>

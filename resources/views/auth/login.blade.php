<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Sistem Informasi Event & Rekap Kegiatan UHB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-navy-900 bg-white">

    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Left Side - Image/Branding -->
        <div class="hidden md:flex md:w-1/2 relative overflow-hidden bg-navy-900 justify-center items-center p-12">
            <!-- Decorative Backgrounds -->
            <div class="absolute top-0 left-0 w-full h-full opacity-20">
                <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-uhbblue-500 blur-3xl mix-blend-screen animate-blob"></div>
                <div class="absolute bottom-10 -right-24 w-96 h-96 rounded-full bg-uhbamber-500 blur-3xl mix-blend-screen animate-blob animation-delay-2000"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 rounded-full bg-purple-500 blur-3xl mix-blend-screen animate-blob animation-delay-4000"></div>
            </div>
            
            <div class="relative z-10 max-w-md text-center text-white">
                <a href="/" class="inline-flex items-center gap-3 mb-12">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-uhbblue-600 to-uhbamber-400 flex items-center justify-center font-bold text-2xl shadow-xl">
                        UHB
                    </div>
                </a>
                
                <h1 class="text-4xl font-bold mb-6 leading-tight">Mulai Perjalanan Organisasimu di Sini</h1>
                <p class="text-navy-200 text-lg mb-12">Kelola event, simpan sertifikat, dan bangun portofolio kegiatanmu selama di Universitas Harapan Bangsa.</p>
                
                <!-- Mockup of Dashboard -->
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 shadow-2xl transform rotate-2 hover:rotate-0 transition-transform duration-500">
                    <div class="flex gap-2 mb-4">
                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    </div>
                    <div class="space-y-3">
                        <div class="h-4 bg-white/20 rounded w-3/4"></div>
                        <div class="h-4 bg-white/20 rounded w-1/2"></div>
                        <div class="h-4 bg-white/20 rounded w-5/6"></div>
                        <div class="grid grid-cols-2 gap-3 pt-3">
                            <div class="h-20 bg-uhbblue-500/30 rounded-xl"></div>
                            <div class="h-20 bg-uhbamber-500/30 rounded-xl"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8 bg-navy-50 relative">
            <div class="absolute top-0 right-0 w-64 h-64 bg-uhbblue-200 rounded-full blur-3xl opacity-30 -mr-32 -mt-32"></div>
            
            <div class="w-full max-w-md relative z-10 bg-white/80 backdrop-blur-xl p-10 rounded-3xl shadow-2xl border border-white">
                <!-- Mobile Logo -->
                <div class="md:hidden flex justify-center mb-8">
                    <a href="/" class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-uhbblue-600 to-uhbamber-400 flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            UHB
                        </div>
                    </a>
                </div>

                <div class="mb-10 text-center md:text-left">
                    <h2 class="text-3xl font-bold text-navy-900 mb-2">Selamat Datang 👋</h2>
                    <p class="text-navy-500">Silakan masuk menggunakan akun SIA Anda</p>
                </div>

                @if (session('status'))
                    <div class="mb-6 font-medium text-sm text-green-600 bg-green-50 p-4 rounded-xl border border-green-100">
                        {{ session('status') }}
                    </div>
                @endif
                
                <x-validation-errors class="mb-6" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-semibold text-navy-700 mb-2">Email / NIM</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-navy-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="w-full pl-11 pr-4 py-3 bg-navy-50 border-none rounded-xl text-navy-900 focus:ring-2 focus:ring-uhbblue-500 transition-all shadow-inner" placeholder="Masukkan email atau NIM">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-navy-700 mb-2">Password</label>
                        <div class="relative" x-data="{ show: false }">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-navy-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input id="password" :type="show ? 'text' : 'password'" name="password" required autocomplete="current-password" class="w-full pl-11 pr-12 py-3 bg-navy-50 border-none rounded-xl text-navy-900 focus:ring-2 focus:ring-uhbblue-500 transition-all shadow-inner" placeholder="••••••••">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" @click="show = !show" class="p-1 text-navy-400 hover:text-navy-600 focus:outline-none rounded-md">
                                    <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    <svg x-show="show" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center group cursor-pointer">
                            <x-checkbox id="remember_me" name="remember" class="w-5 h-5 rounded border-navy-300 text-uhbblue-600 focus:ring-uhbblue-500 cursor-pointer" />
                            <span class="ml-3 text-sm text-navy-600 group-hover:text-navy-900 transition">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm font-semibold text-uhbblue-600 hover:text-uhbblue-500 transition" href="{{ route('password.request') }}">
                                Lupa Password?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="w-full py-3.5 px-4 bg-navy-900 text-white font-bold rounded-xl hover:bg-navy-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-navy-900 transition-all shadow-lg hover:shadow-navy-900/30 transform hover:-translate-y-0.5">
                        Log in
                    </button>
                    
                    @if (Route::has('register'))
                    <p class="text-center text-sm text-navy-600 mt-6">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="font-bold text-uhbblue-600 hover:text-uhbblue-500 transition">Daftar sekarang</a>
                    </p>
                    @endif
                </form>
            </div>
        </div>
    </div>
    
    <style>
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
    </style>
</body>
</html>

<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true', showPass: false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login – SiNilai UHB</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .login-bg {
            background: radial-gradient(ellipse at 20% 50%, rgba(99,102,241,0.15) 0%, transparent 50%),
                        radial-gradient(ellipse at 80% 20%, rgba(168,85,247,0.12) 0%, transparent 50%),
                        radial-gradient(ellipse at 60% 80%, rgba(6,182,212,0.10) 0%, transparent 50%),
                        linear-gradient(135deg, #f8faff 0%, #eef2ff 50%, #faf5ff 100%);
        }
        .dark .login-bg {
            background: radial-gradient(ellipse at 20% 50%, rgba(99,102,241,0.15) 0%, transparent 50%),
                        radial-gradient(ellipse at 80% 20%, rgba(168,85,247,0.12) 0%, transparent 50%),
                        radial-gradient(ellipse at 60% 80%, rgba(6,182,212,0.10) 0%, transparent 50%),
                        linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f0f23 100%);
        }
        @keyframes float-a { 0%,100%{transform:translateY(0) rotate(0deg)}50%{transform:translateY(-20px) rotate(5deg)} }
        @keyframes float-b { 0%,100%{transform:translateY(0) rotate(0deg)}50%{transform:translateY(-14px) rotate(-3deg)} }
        .float-a { animation: float-a 7s ease-in-out infinite; }
        .float-b { animation: float-b 9s ease-in-out infinite; }
        @keyframes fadeUp { from{opacity:0;transform:translateY(24px)}to{opacity:1;transform:translateY(0)} }
        .fade-up { animation: fadeUp 0.6s ease both; }
        .fade-up-1 { animation-delay: 0.1s; }
        .fade-up-2 { animation-delay: 0.2s; }
        .fade-up-3 { animation-delay: 0.3s; }
        .fade-up-4 { animation-delay: 0.4s; }
    </style>
</head>
<body class="antialiased login-bg min-h-screen flex items-center justify-center p-4 transition-colors duration-300">

    {{-- Dark Mode Toggle --}}
    <button @click="darkMode = !darkMode" class="fixed top-4 right-4 p-2.5 rounded-xl bg-white/80 dark:bg-slate-800/80 backdrop-blur shadow-md border border-white/50 dark:border-slate-700/50 text-slate-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors z-10">
        <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
    </button>

    {{-- Floating Decorations --}}
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="float-a absolute top-16 left-16 w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-400/20 to-violet-400/20 backdrop-blur-sm border border-indigo-200/30 dark:border-indigo-700/20"></div>
        <div class="float-b absolute top-32 right-20 w-12 h-12 rounded-xl bg-gradient-to-br from-cyan-400/20 to-blue-400/20 backdrop-blur-sm border border-cyan-200/30 dark:border-cyan-700/20"></div>
        <div class="float-a absolute bottom-24 left-24 w-20 h-20 rounded-3xl bg-gradient-to-br from-purple-400/15 to-pink-400/15 backdrop-blur-sm border border-purple-200/30 dark:border-purple-700/20" style="animation-delay:-3s"></div>
        <div class="float-b absolute bottom-40 right-32 w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-400/20 to-teal-400/20 backdrop-blur-sm border border-emerald-200/30" style="animation-delay:-5s"></div>
    </div>

    {{-- Login Card --}}
    <div class="w-full max-w-md">

        {{-- Logo & Brand --}}
        <div class="text-center mb-8 fade-up fade-up-1">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 shadow-2xl shadow-indigo-500/30 mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 via-violet-600 to-purple-600 dark:from-indigo-400 dark:via-violet-400 dark:to-purple-400">SiNilai UHB</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Sistem Informasi Akademik Mahasiswa</p>
            <p class="text-xs text-slate-400 dark:text-slate-500 mt-0.5">Universitas Harapan Bangsa</p>
        </div>

        {{-- Card --}}
        <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-2xl rounded-3xl shadow-2xl shadow-indigo-500/10 dark:shadow-slate-900/50 border border-white/60 dark:border-slate-700/50 p-8 fade-up fade-up-2">

            <h2 class="text-xl font-bold text-slate-800 dark:text-slate-100 mb-1">Selamat Datang 👋</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Masuk untuk mengakses sistem nilai mahasiswa</p>

            {{-- Validation Errors --}}
            <x-validation-errors class="mb-4" />

            @session('status')
            <div class="mb-4 p-3 bg-emerald-50 dark:bg-emerald-900/30 border border-emerald-200 dark:border-emerald-800 rounded-xl text-sm text-emerald-700 dark:text-emerald-400">
                {{ $value }}
            </div>
            @endsession

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                {{-- Email --}}
                <div class="fade-up fade-up-3">
                    <label for="email" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Email / NIP</label>
                    <div class="relative">
                        <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                               placeholder="admin@uhb.ac.id"
                               class="w-full pl-10 pr-4 py-3 bg-slate-50/80 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-800 dark:text-slate-200 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400 dark:focus:border-indigo-500 transition-all">
                    </div>
                </div>

                {{-- Password --}}
                <div class="fade-up fade-up-3">
                    <label for="password" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Password</label>
                    <div class="relative">
                        <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <input id="password" name="password" :type="showPass ? 'text' : 'password'" required autocomplete="current-password"
                               placeholder="••••••••"
                               class="w-full pl-10 pr-12 py-3 bg-slate-50/80 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-800 dark:text-slate-200 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400 dark:focus:border-indigo-500 transition-all">
                        <button type="button" @click="showPass = !showPass" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                            <svg x-show="!showPass" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <svg x-show="showPass" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                        </button>
                    </div>
                </div>

                {{-- Remember + Forgot --}}
                <div class="flex items-center justify-between fade-up fade-up-3">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input id="remember_me" name="remember" type="checkbox" class="w-4 h-4 rounded border-slate-300 dark:border-slate-600 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-0">
                        <span class="text-sm text-slate-600 dark:text-slate-400">Ingat Saya</span>
                    </label>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 dark:text-indigo-400 font-semibold hover:underline">Lupa Password?</a>
                    @endif
                </div>

                {{-- Login Button --}}
                <button type="submit" class="fade-up fade-up-4 w-full py-3.5 bg-gradient-to-r from-indigo-500 via-violet-500 to-purple-600 text-white font-bold rounded-xl shadow-lg shadow-indigo-500/30 hover:shadow-xl hover:shadow-indigo-500/40 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 text-sm">
                    Masuk ke Dashboard
                </button>
            </form>

            {{-- Divider --}}
            <div class="flex items-center gap-3 my-5">
                <div class="flex-1 h-px bg-slate-200 dark:bg-slate-700"></div>
                <span class="text-xs text-slate-400 dark:text-slate-500">atau masuk sebagai</span>
                <div class="flex-1 h-px bg-slate-200 dark:bg-slate-700"></div>
            </div>

            {{-- Role Quick Logins --}}
            <div class="grid grid-cols-3 gap-2">
                @foreach([
                    ['Admin','bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300','M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                    ['Dosen','bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300','M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                    ['Mahasiswa','bg-violet-100 dark:bg-violet-900/30 text-violet-700 dark:text-violet-300','M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                ] as [$role,$cls,$icon])
                <button class="flex flex-col items-center gap-1.5 p-3 rounded-xl {{ $cls }} hover:scale-105 active:scale-95 transition-transform duration-150">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
                    <span class="text-xs font-semibold">{{ $role }}</span>
                </button>
                @endforeach
            </div>
        </div>

        {{-- Footer --}}
        <p class="text-center text-xs text-slate-500 dark:text-slate-500 mt-6 fade-up fade-up-4">
            © {{ date('Y') }} Universitas Harapan Bangsa · <span class="text-indigo-500">SiNilai v2.0</span>
        </p>
    </div>

</body>
</html>

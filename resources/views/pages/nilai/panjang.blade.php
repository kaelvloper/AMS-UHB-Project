<!DOCTYPE html>
<html lang="id" x-data="{
    darkMode: false,
    searchQuery: '',
    flash: {show: false, message: '', type: ''},
    selectedAngkatan: '',
    selectedFakultas: '',
    selectedProdi: '',
    selectedMK: '',
    resetFilter() {
        this.searchQuery = '';
        this.selectedAngkatan = '';
        this.selectedFakultas = '';
        this.selectedProdi = '';
        this.selectedMK = '';
    }
}" :class="{'dark': darkMode}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nilai Panjang Mahasiswa � SiNilai UHB</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  darkMode: 'class',
  theme: {
    extend: {
      fontFamily: { sans: ['Plus Jakarta Sans','sans-serif'] },
      colors: {
        uhb: { 50:'#eff6ff',100:'#dbeafe',200:'#bfdbfe',300:'#93c5fd',400:'#60a5fa',500:'#3b82f6',600:'#2563eb',700:'#1d4ed8',800:'#1e40af',900:'#1e3a8a' },
        gold: { 100:'#fef9c3',200:'#fef08a',300:'#fde047',400:'#facc15',500:'#eab308',600:'#ca8a04' }
      }
    }
  }
}
</script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<style>
[x-cloak]{display:none!important}
body{font-family:'Plus Jakarta Sans',sans-serif}
::-webkit-scrollbar{width:5px;height:5px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:#94a3b8;border-radius:10px}
.dark ::-webkit-scrollbar-thumb{background:#475569}
.nav-link{display:flex;align-items:center;gap:10px;padding:10px 14px;border-radius:12px;font-size:14px;font-weight:500;color:#64748b;transition:all .2s ease;cursor:pointer}
.nav-link:hover{background:#eff6ff;color:#2563eb}
.nav-link.active{background:linear-gradient(135deg,#eff6ff,#dbeafe);color:#1d4ed8;font-weight:700;border-left:3px solid #2563eb}
.dark .nav-link{color:#94a3b8}
.dark .nav-link:hover{background:rgba(37,99,235,.15);color:#60a5fa}
.dark .nav-link.active{background:rgba(37,99,235,.2);color:#60a5fa}
.stat-card{transition:transform .25s ease,box-shadow .25s ease}
.stat-card:hover{transform:translateY(-3px);box-shadow:0 12px 32px rgba(37,99,235,.12)}
.nested-dd{visibility:hidden;opacity:0;transform:translateX(6px);transition:all .18s ease;pointer-events:none}
.has-nested:hover>.nested-dd{visibility:visible;opacity:1;transform:translateX(0);pointer-events:auto;transition-delay:.08s}
.dd-fixed{position:fixed;z-index:9999;background:#fff;border:1.5px solid #e2e8f0;border-radius:14px;box-shadow:0 20px 60px rgba(0,0,0,.15);padding:6px 0;min-width:220px;overflow:visible}
.dark .dd-fixed{background:#1e293b;border-color:#334155}
.filter-btn{display:flex;align-items:center;gap:8px;padding:9px 14px;background:#fff;border:1.5px solid #e2e8f0;border-radius:12px;font-size:13px;font-weight:600;color:#475569;transition:all .2s ease;cursor:pointer;white-space:nowrap}
.filter-btn:hover{border-color:#3b82f6;color:#1d4ed8;background:#eff6ff}
.dark .filter-btn{background:#1e293b;border-color:#334155;color:#94a3b8}
.dark .filter-btn:hover{border-color:#3b82f6;color:#60a5fa;background:rgba(37,99,235,.1)}
.dd-menu{position:absolute;top:calc(100% + 6px);left:0;min-width:220px;background:#fff;border:1.5px solid #e2e8f0;border-radius:14px;box-shadow:0 20px 60px rgba(0,0,0,.12);z-index:100;padding:6px 0;overflow:visible}
.dark .dd-menu{background:#1e293b;border-color:#334155}
.dd-item{position:relative;display:flex;align-items:center;justify-content:space-between;padding:10px 16px;font-size:13px;font-weight:600;color:#475569;cursor:pointer;transition:all .15s}
.dd-item:hover{background:#eff6ff;color:#1d4ed8}
.dark .dd-item{color:#94a3b8}
.dark .dd-item:hover{background:rgba(37,99,235,.1);color:#60a5fa}
.dd-sub{display:flex;align-items:center;padding:9px 16px;font-size:13px;color:#475569;cursor:pointer;transition:all .15s;white-space:nowrap}
.dd-sub:hover{background:#eff6ff;color:#1d4ed8}
.dark .dd-sub{color:#94a3b8}
.dark .dd-sub:hover{background:rgba(37,99,235,.1);color:#60a5fa}
.badge-a{display:inline-flex;align-items:center;justify-content:center;padding:3px 10px;border-radius:8px;font-size:11px;font-weight:800;background:#d1fae5;color:#065f46;border:1px solid #a7f3d0}
.badge-b{display:inline-flex;align-items:center;justify-content:center;padding:3px 10px;border-radius:8px;font-size:11px;font-weight:800;background:#dbeafe;color:#1e40af;border:1px solid #bfdbfe}
.badge-c{display:inline-flex;align-items:center;justify-content:center;padding:3px 10px;border-radius:8px;font-size:11px;font-weight:800;background:#fef3c7;color:#92400e;border:1px solid #fde68a}
.badge-d{display:inline-flex;align-items:center;justify-content:center;padding:3px 10px;border-radius:8px;font-size:11px;font-weight:800;background:#fee2e2;color:#991b1b;border:1px solid #fecaca}
@keyframes fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
.anim-up{animation:fadeUp .4s ease both}
@keyframes slideIn{from{opacity:0;transform:translateX(-8px)}to{opacity:1;transform:translateX(0)}}
.flash-msg{animation:slideIn .3s ease both}
</style>
@livewireStyles
</head>
<body class="bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-200 antialiased transition-colors duration-300" x-cloak>
<div class="flex h-screen overflow-hidden">
<!-- MAIN AREA -->
<div class="flex-1 flex flex-col overflow-hidden">
<!-- HEADER -->
<header class="bg-white dark:bg-slate-900 border-b border-slate-100 dark:border-slate-800 px-6 py-3 flex items-center justify-between gap-4 flex-shrink-0 shadow-sm z-20">
  <!-- Breadcrumb -->
  <div class="flex items-center gap-2 text-xs text-slate-400 font-medium min-w-0">
    <svg class="w-4 h-4 text-uhb-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
    <span class="text-slate-600 dark:text-slate-300 font-semibold">SiNilai</span>
    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    <span>Nilai Mahasiswa</span>
    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    <span class="text-uhb-600 dark:text-uhb-400 font-semibold truncate">Nilai Panjang</span>
  </div>

  <!-- Right Actions -->
  <div class="flex items-center gap-2 flex-shrink-0">
    <button @click="darkMode=!darkMode" class="w-9 h-9 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-uhb-50 hover:text-uhb-600 transition-all">
      <svg x-show="!darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
      <svg x-show="darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
    </button>
    <button class="relative w-9 h-9 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 hover:bg-uhb-50 hover:text-uhb-600 transition-all">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
      <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-gold-400 rounded-full border-2 border-white dark:border-slate-800"></span>
    </button>
    <div class="flex items-center gap-2.5 pl-2.5 border-l border-slate-200 dark:border-slate-700 cursor-pointer">
      <img src="https://ui-avatars.com/api/?name=Admin+Akademik&background=2563eb&color=fff&bold=true&rounded=true" alt="Admin" class="w-9 h-9 rounded-xl shadow-sm ring-2 ring-uhb-200 dark:ring-uhb-900">
      <div class="hidden sm:block">
        <p class="text-xs font-bold text-slate-700 dark:text-slate-200 leading-tight">Admin Akademik</p>
        <p class="text-[10px] text-uhb-600 dark:text-uhb-400 font-semibold">Superadmin</p>
      </div>
    </div>
  </div>
</header>
<!-- PAGE CONTENT -->
<main class="flex-1 flex flex-col min-h-0"><div class="flex-1 overflow-y-auto p-6 space-y-5">

<!-- FLASH MESSAGE -->
<div x-show="flash.show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="flash-msg flex items-center gap-3 px-5 py-3.5 rounded-2xl font-semibold text-sm shadow-lg" :class="flash.type==='success' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-red-50 text-red-700 border border-red-200'" style="display:none">
  <svg x-show="flash.type==='success'" class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
  <svg x-show="flash.type==='error'" class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
  <span x-text="flash.message"></span>
  <button @click="flash.show=false" class="ml-auto opacity-60 hover:opacity-100 transition-opacity"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
</div>

<!-- HERO CARD -->
<div class="anim-up relative bg-gradient-to-r from-uhb-700 via-uhb-600 to-uhb-500 rounded-2xl p-6 overflow-hidden shadow-xl shadow-uhb-600/20">
  <div class="absolute inset-0 overflow-hidden">
    <div class="absolute -top-10 -right-10 w-56 h-56 bg-white/10 rounded-full"></div>
    <div class="absolute -bottom-14 -left-8 w-72 h-72 bg-uhb-800/30 rounded-full"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-white/5 rounded-full"></div>
  </div>
  <div class="relative flex flex-col md:flex-row md:items-center justify-between gap-5">
    <div>
      <div class="flex items-center gap-2 mb-3">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-gold-400/20 text-gold-300 text-xs font-bold rounded-full border border-gold-400/30">
          <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          Semester Genap 2024/2025
        </span>
      </div>
      <h1 class="text-2xl font-extrabold text-white mb-1 leading-tight">Nilai Panjang Mahasiswa</h1>
      <p class="text-uhb-200 text-sm font-medium">Rekap lengkap nilai akademik seluruh mahasiswa aktif Universitas Harapan Bangsa</p>
    </div>
    <div class="flex flex-wrap gap-2.5">
      <button onclick="showFlash('Export PDF sedang diproses...','success')" class="flex items-center gap-2 px-5 py-2.5 bg-white/15 hover:bg-white/25 border border-white/25 text-white text-sm font-bold rounded-xl transition-all hover:-translate-y-0.5 backdrop-blur-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
        Export PDF
      </button>
      <button onclick="showFlash('Export Excel sedang diproses...','success')" class="flex items-center gap-2 px-5 py-2.5 bg-gold-400 hover:bg-gold-300 text-slate-900 text-sm font-extrabold rounded-xl transition-all hover:-translate-y-0.5 shadow-lg shadow-gold-500/30">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
        Export Excel
      </button>
    </div>
  </div>
</div>

<!-- STAT CARDS -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 anim-up" style="animation-delay:.06s">
  <div class="stat-card bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-100 dark:border-slate-800 shadow-sm">
    <div class="flex items-start gap-3">
      <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-uhb-500 to-uhb-700 flex items-center justify-center shadow-md shadow-uhb-500/30 flex-shrink-0">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
      </div>
      <div>
        <p class="text-xs text-slate-500 dark:text-slate-400 font-semibold">Total Mahasiswa</p>
        <p class="text-2xl font-extrabold text-slate-800 dark:text-slate-100 mt-0.5">4.872</p>
        <p class="text-xs text-emerald-500 font-bold mt-1">? +124 bulan ini</p>
      </div>
    </div>
  </div>
  <div class="stat-card bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-100 dark:border-slate-800 shadow-sm">
    <div class="flex items-start gap-3">
      <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-gold-400 to-gold-600 flex items-center justify-center shadow-md shadow-gold-400/30 flex-shrink-0">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
      </div>
      <div>
        <p class="text-xs text-slate-500 dark:text-slate-400 font-semibold">Rata-rata IPK</p>
        <p class="text-2xl font-extrabold text-slate-800 dark:text-slate-100 mt-0.5">3.52</p>
        <p class="text-xs text-emerald-500 font-bold mt-1">? +0.03 semester lalu</p>
      </div>
    </div>
  </div>
  <div class="stat-card bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-100 dark:border-slate-800 shadow-sm">
    <div class="flex items-start gap-3">
      <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center shadow-md shadow-emerald-500/30 flex-shrink-0">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
      </div>
      <div>
        <p class="text-xs text-slate-500 dark:text-slate-400 font-semibold">Mahasiswa Lulus</p>
        <p class="text-2xl font-extrabold text-slate-800 dark:text-slate-100 mt-0.5">3.941</p>
        <p class="text-xs text-slate-400 font-semibold mt-1">80.9% kelulusan</p>
      </div>
    </div>
  </div>
  <div class="stat-card bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-100 dark:border-slate-800 shadow-sm">
    <div class="flex items-start gap-3">
      <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-violet-500 to-purple-700 flex items-center justify-center shadow-md shadow-violet-500/30 flex-shrink-0">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
      </div>
      <div>
        <p class="text-xs text-slate-500 dark:text-slate-400 font-semibold">Total Mata Kuliah</p>
        <p class="text-2xl font-extrabold text-slate-800 dark:text-slate-100 mt-0.5">248</p>
        <p class="text-xs text-slate-400 font-semibold mt-1">Seluruh prodi aktif</p>
      </div>
    </div>
  </div>
</div>
<!-- FILTER CARD -->
<div class="relative z-50 bg-white dark:bg-slate-900 rounded-2xl border border-slate-100 dark:border-slate-800 shadow-sm p-5 anim-up" style="animation-delay:.1s;overflow:visible">
  <div class="flex items-center gap-2 mb-4">
    <div class="w-7 h-7 rounded-lg bg-uhb-50 dark:bg-uhb-900/30 flex items-center justify-center">
      <svg class="w-4 h-4 text-uhb-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
    </div>
    <h3 class="text-sm font-bold text-slate-700 dark:text-slate-200">Filter Data</h3>
  </div>
  <div class="flex flex-wrap items-center gap-3">

    <!-- Search Input -->
    <div class="relative flex-1 min-w-[200px]">
      <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/></svg>
      <input type="text" placeholder="Cari nama mahasiswa atau NIM..." x-model="searchQuery" class="w-full pl-9 pr-4 py-2.5 text-sm bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-uhb-500/30 focus:border-uhb-400 transition-all">
    </div>

    <!-- Filter Angkatan -->
    <div class="relative z-[100]" x-data="{open:false}" @click.away="open=false">
      <button @click="open=!open" class="filter-btn">
        <svg class="w-4 h-4 text-uhb-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        <span x-text="selectedAngkatan || 'Semua Angkatan'"></span>
        <svg class="w-3.5 h-3.5 text-slate-400 transition-transform" :class="open?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
      </button>
      <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="dd-menu" style="display:none">
        <template x-for="thn in ['Semua Angkatan','2020','2021','2022','2023','2024','2025','2026']" :key="thn">
          <a href="#" @click.prevent="selectedAngkatan=thn==='Semua Angkatan'?'':thn;open=false" class="dd-sub" :class="(selectedAngkatan===thn||(thn==='Semua Angkatan'&&!selectedAngkatan))?'text-uhb-600 font-bold bg-uhb-50 dark:bg-uhb-900/30':''" x-text="thn"></a>
        </template>
      </div>
    </div>

    <!-- Filter Fakultas Nested -->
    <div class="relative z-[100]" x-data="{open:false}" @click.away="open=false">
      <button @click="open=!open" class="filter-btn">
        <svg class="w-4 h-4 text-uhb-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        <span x-text="selectedFakultas||'Semua Fakultas'"></span>
        <svg class="w-3.5 h-3.5 text-slate-400 transition-transform" :class="open?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
      </button>
      <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="dd-menu w-56" style="display:none">
        <a href="#" @click.prevent="selectedFakultas='';selectedProdi='';open=false" class="dd-sub font-bold text-uhb-600">Semua Fakultas</a>
        <div class="h-px bg-slate-100 dark:bg-slate-700 my-1"></div>
        <!-- Teknologi & Sains -->
        <div class="relative has-nested group">
          <div class="dd-item">
            <div class="flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-uhb-400"></div>Teknologi &amp; Sains</div>
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
          </div>
          <div class="nested-dd absolute left-full top-0 w-64 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-xl py-2">
            <p class="px-4 py-2 text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Teknologi &amp; Sains</p>
            <a href="#" @click.prevent="selectedFakultas='Teknologi & Sains';selectedProdi='S1 Informatika';open=false" class="dd-sub">S1 Informatika</a>
            <a href="#" @click.prevent="selectedFakultas='Teknologi & Sains';selectedProdi='S1 Sistem Informasi';open=false" class="dd-sub">S1 Sistem Informasi</a>
            <a href="#" @click.prevent="selectedFakultas='Teknologi & Sains';selectedProdi='S1 Teknik Robotika';open=false" class="dd-sub">S1 Teknik Robotika &amp; Kecerdasan Buatan</a>
          </div>
        </div>
        <!-- Ilmu Sosial -->
        <div class="relative has-nested group">
          <div class="dd-item">
            <div class="flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-violet-400"></div>Ilmu Sosial</div>
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
          </div>
          <div class="nested-dd absolute left-full top-0 w-64 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-xl py-2">
            <p class="px-4 py-2 text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Ilmu Sosial</p>
            <a href="#" @click.prevent="selectedFakultas='Ilmu Sosial';selectedProdi='S1 Hukum';open=false" class="dd-sub">S1 Hukum</a>
            <a href="#" @click.prevent="selectedFakultas='Ilmu Sosial';selectedProdi='S1 Akuntansi';open=false" class="dd-sub">S1 Akuntansi</a>
            <a href="#" @click.prevent="selectedFakultas='Ilmu Sosial';selectedProdi='S1 Manajemen';open=false" class="dd-sub">S1 Manajemen</a>
            <a href="#" @click.prevent="selectedFakultas='Ilmu Sosial';selectedProdi='S1 Pendidikan Bahasa Inggris';open=false" class="dd-sub">S1 Pendidikan Bahasa Inggris</a>
            <a href="#" @click.prevent="selectedFakultas='Ilmu Sosial';selectedProdi='S1 Bisnis Digital';open=false" class="dd-sub">S1 Bisnis Digital</a>
            <a href="#" @click.prevent="selectedFakultas='Ilmu Sosial';selectedProdi='S1 Pariwisata';open=false" class="dd-sub">S1 Pariwisata</a>
          </div>
        </div>
        <!-- Kesehatan -->
        <div class="relative has-nested group">
          <div class="dd-item">
            <div class="flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-emerald-400"></div>Kesehatan</div>
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
          </div>
          <div class="nested-dd absolute left-full top-0 w-64 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-xl py-2">
            <p class="px-4 py-2 text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Kesehatan</p>
            <a href="#" @click.prevent="selectedFakultas='Kesehatan';selectedProdi='S1 Keperawatan';open=false" class="dd-sub">S1 Keperawatan</a>
            <a href="#" @click.prevent="selectedFakultas='Kesehatan';selectedProdi='S1 Farmasi';open=false" class="dd-sub">S1 Farmasi</a>
            <a href="#" @click.prevent="selectedFakultas='Kesehatan';selectedProdi='D3 Keperawatan';open=false" class="dd-sub">D3 Keperawatan</a>
            <a href="#" @click.prevent="selectedFakultas='Kesehatan';selectedProdi='S1 Kebidanan';open=false" class="dd-sub">S1 Kebidanan</a>
            <a href="#" @click.prevent="selectedFakultas='Kesehatan';selectedProdi='D4 Keperawatan Anestesiologi';open=false" class="dd-sub">D4 Keperawatan Anestesiologi</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Filter Mata Kuliah Nested -->
    <div class="relative z-[100]" x-data="{open:false}" @click.away="open=false">
      <button @click="open=!open" class="filter-btn">
        <svg class="w-4 h-4 text-uhb-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
        <span x-text="selectedMK||'Semua Mata Kuliah'"></span>
        <svg class="w-3.5 h-3.5 text-slate-400 transition-transform" :class="open?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
      </button>
      <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="dd-menu w-60" style="display:none">
        <a href="#" @click.prevent="selectedMK='';open=false" class="dd-sub font-bold text-uhb-600">Semua Mata Kuliah</a>
        <div class="h-px bg-slate-100 dark:bg-slate-700 my-1"></div>
        <div class="relative has-nested group">
          <div class="dd-item"><div class="flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-uhb-400"></div>Informatika</div><svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></div>
          <div class="nested-dd absolute right-full top-0 w-60 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-xl py-2">
            <a href="#" @click.prevent="selectedMK='Algoritma & Pemrograman';open=false" class="dd-sub">Algoritma &amp; Pemrograman</a>
            <a href="#" @click.prevent="selectedMK='Struktur Data';open=false" class="dd-sub">Struktur Data</a>
            <a href="#" @click.prevent="selectedMK='Basis Data';open=false" class="dd-sub">Basis Data</a>
            <a href="#" @click.prevent="selectedMK='Pemrograman Web';open=false" class="dd-sub">Pemrograman Web</a>
            <a href="#" @click.prevent="selectedMK='Kecerdasan Buatan';open=false" class="dd-sub">Kecerdasan Buatan</a>
            <a href="#" @click.prevent="selectedMK='Machine Learning';open=false" class="dd-sub">Machine Learning</a>
          </div>
        </div>
        <div class="relative has-nested group">
          <div class="dd-item"><div class="flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-violet-400"></div>Sistem Informasi</div><svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></div>
          <div class="nested-dd absolute right-full top-0 w-60 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-xl py-2">
            <a href="#" @click.prevent="selectedMK='Analisis Sistem';open=false" class="dd-sub">Analisis Sistem</a>
            <a href="#" @click.prevent="selectedMK='ERP';open=false" class="dd-sub">Enterprise Resource Planning</a>
            <a href="#" @click.prevent="selectedMK='Sistem Pendukung Keputusan';open=false" class="dd-sub">Sistem Pendukung Keputusan</a>
            <a href="#" @click.prevent="selectedMK='Manajemen Proyek TI';open=false" class="dd-sub">Manajemen Proyek TI</a>
          </div>
        </div>
        <div class="relative has-nested group">
          <div class="dd-item"><div class="flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-emerald-400"></div>Kesehatan</div><svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></div>
          <div class="nested-dd absolute right-full top-0 w-56 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-xl py-2">
            <a href="#" @click.prevent="selectedMK='Anatomi';open=false" class="dd-sub">Anatomi</a>
            <a href="#" @click.prevent="selectedMK='Farmakologi';open=false" class="dd-sub">Farmakologi</a>
            <a href="#" @click.prevent="selectedMK='Keperawatan Dasar';open=false" class="dd-sub">Keperawatan Dasar</a>
            <a href="#" @click.prevent="selectedMK='Gizi Klinik';open=false" class="dd-sub">Gizi Klinik</a>
          </div>
        </div>
        <div class="relative has-nested group">
          <div class="dd-item"><div class="flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-gold-400"></div>Bisnis &amp; Sosial</div><svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></div>
          <div class="nested-dd absolute right-full top-0 w-56 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-xl py-2">
            <a href="#" @click.prevent="selectedMK='Pengantar Akuntansi';open=false" class="dd-sub">Pengantar Akuntansi</a>
            <a href="#" @click.prevent="selectedMK='Manajemen Keuangan';open=false" class="dd-sub">Manajemen Keuangan</a>
            <a href="#" @click.prevent="selectedMK='Hukum Bisnis';open=false" class="dd-sub">Hukum Bisnis</a>
            <a href="#" @click.prevent="selectedMK='Digital Marketing';open=false" class="dd-sub">Digital Marketing</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Reset Filter -->
    <button @click="resetFilter()" class="flex items-center gap-1.5 px-4 py-2.5 text-sm font-semibold text-slate-500 hover:text-uhb-600 hover:bg-uhb-50 dark:hover:bg-uhb-900/20 rounded-xl transition-all border border-slate-200 dark:border-slate-700 hover:border-uhb-300">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
      Reset
    </button>
  </div>

  <!-- Active Filters -->
  <div x-show="selectedAngkatan||selectedFakultas||selectedMK||searchQuery" class="flex flex-wrap gap-2 mt-4 pt-4 border-t border-slate-100 dark:border-slate-800" style="display:none">
    <span class="text-xs text-slate-400 font-semibold self-center">Filter aktif:</span>
    <template x-if="selectedAngkatan"><span class="inline-flex items-center gap-1.5 px-3 py-1 bg-uhb-100 text-uhb-700 text-xs font-bold rounded-full"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg><span x-text="selectedAngkatan"></span><button @click="selectedAngkatan=''" class="hover:text-uhb-900">�</button></span></template>
    <template x-if="selectedFakultas"><span class="inline-flex items-center gap-1.5 px-3 py-1 bg-violet-100 text-violet-700 text-xs font-bold rounded-full"><span x-text="selectedProdi||selectedFakultas"></span><button @click="selectedFakultas='';selectedProdi=''" class="hover:text-violet-900">�</button></span></template>
    <template x-if="selectedMK"><span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-bold rounded-full"><span x-text="selectedMK"></span><button @click="selectedMK=''" class="hover:text-emerald-900">�</button></span></template>
    <template x-if="searchQuery"><span class="inline-flex items-center gap-1.5 px-3 py-1 bg-gold-100 text-gold-700 text-xs font-bold rounded-full"><span x-text='"\"" + searchQuery + "\""'></span><button @click="searchQuery=''" class="hover:text-gold-900">�</button></span></template>
  </div>
</div>
<!-- TABLE CARD -->
<div class="mt-4">
    @livewire('nilai-mahasiswa-module')
</div>

</div>
</main>
</div>

@livewireScripts
<script>
function showFlash(msg, type='success') {
    // Trigger Alpine flash state on the root element
    const el = document.querySelector('html');
    if (el && el._x_dataStack) {
        const data = Alpine.$data(el);
        if (data && data.flash) {
            data.flash.message = msg;
            data.flash.type = type;
            data.flash.show = true;
            setTimeout(() => { data.flash.show = false; }, 4000);
        }
    }
}
</script>
</body>
</html>
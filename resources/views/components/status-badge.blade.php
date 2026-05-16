@props(['type' => 'info'])

@php
    $types = [
        'Terealisasi' => 'bg-green-100 text-green-700 border-green-200',
        'Berjalan' => 'bg-amber-100 text-amber-700 border-amber-200',
        'Belum' => 'bg-red-100 text-red-700 border-red-200',
        'info' => 'bg-blue-100 text-blue-700 border-blue-200',
    ];
    $class = $types[$type] ?? $types['info'];
@endphp

<span {{ $attributes->merge(['class' => "px-3 py-1 text-[10px] font-black uppercase tracking-widest rounded-full border $class"]) }}>
    {{ $slot }}
</span>

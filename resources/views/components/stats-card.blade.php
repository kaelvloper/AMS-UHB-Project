@props(['title', 'value', 'icon', 'color' => 'blue'])

@php
    $colors = [
        'blue' => 'border-blue-600 bg-blue-100 text-blue-600',
        'amber' => 'border-amber-400 bg-amber-100 text-amber-600',
        'green' => 'border-green-500 bg-green-100 text-green-600',
        'red' => 'border-red-500 bg-red-100 text-red-600',
    ];
    $colorClass = $colors[$color] ?? $colors['blue'];
    $borderColor = explode(' ', $colorClass)[0];
    $iconBg = explode(' ', $colorClass)[1];
    $iconText = explode(' ', $colorClass)[2];
@endphp

<div {{ $attributes->merge(['class' => "bg-white p-6 rounded-xl shadow-sm border-l-4 $borderColor hover:shadow-md transition-all duration-300 group"]) }}>
    <div class="flex items-center">
        <div class="p-3 rounded-full {{ $iconBg }} {{ $iconText }} mr-4 group-hover:scale-110 transition-transform">
            {{ $icon }}
        </div>
        <div>
            <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">{{ $title }}</p>
            <p class="text-2xl font-extrabold text-gray-900">{{ $value }}</p>
        </div>
    </div>
</div>

{{-- resources/views/components/dashboard/stats-card.blade.php --}}
@props([
    'title',
    'value',
    'percentage',
    'trend' => 'up', // 'up', 'down', 'neutral'
    'icon' => 'chart-bar',
    'color' => 'blue',
    'description' => null
])

@php
    $coloresTendencia = [
        'up' => 'text-emerald-500 bg-emerald-50',
        'down' => 'text-red-500 bg-red-50',
        'neutral' => 'text-gray-500 bg-gray-50'
    ];

    $coloresTarjeta = [
        'blue' => 'from-blue-500 to-blue-600',
        'green' => 'from-emerald-500 to-emerald-600',
        'purple' => 'from-purple-500 to-purple-600',
        'orange' => 'from-orange-500 to-orange-600',
        'pink' => 'from-pink-500 to-pink-600'
    ];
@endphp

<div class="grupo-tarjeta relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
    <div class="absolute inset-0 bg-gradient-to-br {{ $coloresTarjeta[$color] }} opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
    <div class="relative p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0 p-3 rounded-xl bg-gradient-to-br {{ $coloresTarjeta[$color] }} shadow-lg" title="{{ $title }}">
                    <x-heroicon-o-{{$icon}} class="h-6 w-6 text-white" />
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">{{ $title }}</p>
                    @if($description)
                        <p class="text-xs text-gray-500 mt-1">{{ $description }}</p>
                    @endif
                </div>
            </div>
            <div class="flex items-center space-x-1 px-3 py-1 rounded-full {{ $coloresTendencia[$trend] }}" aria-label="Tendencia: {{ $trend }}">
                @if($trend === 'up')
                    <x-heroicon-s-arrow-up class="h-4 w-4" />
                @elseif($trend === 'down')
                    <x-heroicon-s-arrow-down class="h-4 w-4" />
                @else
                    <x-heroicon-s-minus class="h-4 w-4" />
                @endif
                <span class="text-sm font-semibold">{{ $percentage }}</span>
            </div>
        </div>
        <div class="space-y-2">
            <h3 class="text-3xl font-bold text-gray-900 tracking-tight">{{ $value }}</h3>
            <div class="w-full bg-gray-200 rounded-full h-2" aria-label="Progreso">
                <div class="bg-gradient-to-r {{ $coloresTarjeta[$color] }} h-2 rounded-full transition-all duration-1000 ease-out"
                     style="width: {{ abs((int)str_replace(['%', '+', '-'], '', $percentage)) }}%"></div>
            </div>
        </div>
    </div>
</div>

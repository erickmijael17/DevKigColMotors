@props([
    'href',
    'icono',
    'nombreRuta' => '',
    'contador' => null, // Nuevo: para mostrar notificaciones o contadores
    'permiso' => null    // Nuevo: para control de acceso
])

@php
    // Soporte para múltiples rutas activas (útil para submódulos)
    $estaActivo = is_array($nombreRuta)
        ? collect($nombreRuta)->contains(fn($ruta) => request()->routeIs($ruta))
        : request()->routeIs($nombreRuta);

    // Verificación de permisos (si aplica)
    $tienePermiso = $permiso ? auth()->user()->can($permiso) : true;

    $clasesBase = 'flex items-center space-x-4 px-5 py-3 rounded-2xl transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 relative overflow-hidden group';
    $clasesActivo = 'bg-gradient-to-br from-indigo-600 to-purple-700 text-white shadow-xl transform scale-105';
    $clasesInactivo = 'text-slate-700 dark:text-slate-300 hover:bg-indigo-50 dark:hover:bg-slate-700 hover:text-indigo-600 dark:hover:text-white';
    $clases = $clasesBase . ' ' . ($estaActivo ? $clasesActivo : $clasesInactivo);
@endphp

@if($tienePermiso)
    <a
        href="{{ $href }}"
        class="{{ $clases }}"
        role="menuitem"
        aria-current="{{ $estaActivo ? 'page' : 'false' }}"
    >
        <span class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-purple-600 opacity-0 group-hover:opacity-10 transition-opacity duration-300"></span>
        <x-dynamic-component
            :component="'heroicon-o-'.$icono"
            class="h-6 w-6 flex-shrink-0 z-10 {{ $estaActivo ? 'text-white' : 'text-indigo-500 dark:text-purple-400 group-hover:text-indigo-600' }}"
            aria-hidden="true"
        />
        <span class="font-semibold text-lg z-10">
        {{ $slot }}
    </span>

        @if($contador)
            <span class="ml-auto bg-red-500 text-white text-xs font-bold rounded-full h-5 min-w-[20px] flex items-center justify-center px-1 z-10">
        {{ $contador }}
    </span>
        @endif
    </a>
@endif

<style>
    .group:hover .absolute {
        opacity: 0.1; /* Corregido: 10 era demasiado alto */
    }
    .group:hover .h-6 {
        transform: scale(1.1);
        transition: transform 0.2s ease-in-out;
    }
</style>

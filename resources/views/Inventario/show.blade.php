@extends('components.layout')

@section('titulo', 'Detalle del Producto')
@section('subtitulo', 'Información detallada del producto seleccionado')

@section('contenido')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8 mt-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
            <x-heroicon-o-cube class="h-7 w-7 text-blue-500"/>
            {{ $inventario->nombre_producto }}
        </h2>
        <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">
            <x-heroicon-o-tag class="h-4 w-4 mr-1"/> {{ $inventario->categoria->nombre_categoria ?? 'Sin categoría' }}
        </span>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <p class="text-gray-500 font-semibold flex items-center gap-1"><x-heroicon-o-hashtag class="h-5 w-5"/> Código:</p>
            <p class="text-lg font-mono text-gray-900">{{ $inventario->codigo_producto }}</p>
        </div>
        <div>
            <p class="text-gray-500 font-semibold flex items-center gap-1"><x-heroicon-o-user-group class="h-5 w-5"/> Proveedor:</p>
            <p class="text-lg text-gray-900">{{ $inventario->proveedor->nombre_proveedor ?? 'Sin proveedor' }}</p>
        </div>
        <div>
            <p class="text-gray-500 font-semibold flex items-center gap-1"><x-heroicon-o-cube class="h-5 w-5"/> Stock actual:</p>
            <p class="text-lg font-semibold text-gray-900">{{ $inventario->stock_actual }}</p>
        </div>
        <div>
            <p class="text-gray-500 font-semibold flex items-center gap-1"><x-heroicon-o-exclamation-circle class="h-5 w-5"/> Stock mínimo:</p>
            <p class="text-lg text-gray-900">{{ $inventario->stock_minimo }}</p>
        </div>
        <div>
            <p class="text-gray-500 font-semibold flex items-center gap-1"><x-heroicon-o-currency-dollar class="h-5 w-5 text-emerald-700"/> Precio de compra:</p>
            <p class="text-lg font-bold text-emerald-700">S/ {{ number_format($inventario->precio_compra, 2) }}</p>
        </div>
        <div>
            <p class="text-gray-500 font-semibold flex items-center gap-1"><x-heroicon-o-currency-dollar class="h-5 w-5 text-blue-700"/> Precio de venta:</p>
            <p class="text-lg font-bold text-blue-700">S/ {{ number_format($inventario->precio_venta, 2) }}</p>
        </div>
        <div>
            <p class="text-gray-500 font-semibold flex items-center gap-1"><x-heroicon-o-clipboard-document-list class="h-5 w-5"/> Marca:</p>
            <p class="text-lg text-gray-900">{{ $inventario->marca ?? 'Sin marca' }}</p>
        </div>
        <div>
            <p class="text-gray-500 font-semibold flex items-center gap-1"><x-heroicon-o-adjustments-horizontal class="h-5 w-5"/> Unidad de medida:</p>
            <p class="text-lg text-gray-900">{{ $inventario->UM ?? 'No especificada' }}</p>
        </div>
        <div>
            <p class="text-gray-500 font-semibold flex items-center gap-1"><x-heroicon-o-calendar-days class="h-5 w-5"/> Fecha de ingreso:</p>
            <p class="text-lg text-gray-900">{{ $inventario->fecha_ingreso }}</p>
        </div>
        <div>
            <p class="text-gray-500 font-semibold flex items-center gap-1"><x-heroicon-o-information-circle class="h-5 w-5"/> Estado:</p>
            @if($inventario->estado === 'disponible')
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-sm font-semibold">Disponible</span>
            @else
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">Agotado</span>
            @endif
        </div>
    </div>
    <div class="mb-6">
        <p class="text-gray-500 font-semibold flex items-center gap-1 mb-1"><x-heroicon-o-document-text class="h-5 w-5"/> Descripción:</p>
        <p class="text-gray-800 bg-gray-50 rounded-xl p-4">{{ $inventario->descripcion ?? 'Sin descripción' }}</p>
    </div>
    <div class="flex justify-end gap-2 mt-6">
        <a href="{{ route('inventario.edit', $inventario->id_inventario) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-xl hover:bg-yellow-600 transition flex items-center gap-1"><x-heroicon-o-pencil-square class="h-5 w-5"/> Editar</a>
        <a href="{{ route('inventario.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition flex items-center gap-1"><x-heroicon-o-arrow-uturn-left class="h-5 w-5"/> Volver</a>
    </div>
</div>
@endsection
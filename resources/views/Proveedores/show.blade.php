@extends('components.layout')

@section('titulo', 'Detalle del Proveedor')
@section('subtitulo', 'Información completa del proveedor seleccionado')

@section('contenido')
<div class="max-w-7xl mx-auto p-4">
    @if(session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-xl mb-4">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-800 p-4 rounded-xl mb-4">{{ session('error') }}</div>
    @endif
    @if(session('info'))
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-800 p-4 rounded-xl mb-4">{{ session('info') }}</div>
    @endif
    <!-- Header destacado -->
    <div class="rounded-2xl shadow-lg mb-8 p-8 bg-gradient-to-r from-blue-100 via-blue-50 to-emerald-50 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex flex-col gap-2">
            <h1 class="text-3xl font-extrabold text-gray-900 flex items-center gap-2">
                <x-heroicon-o-user-group class="h-8 w-8 text-blue-500"/>
                {{ $proveedor->nombre_proveedor }}
            </h1>
            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-sm font-semibold w-max">
                <x-heroicon-o-check-circle class="h-5 w-5"/>
                {{ ucfirst($proveedor->estado) }}
            </span>
        </div>
        <div class="flex gap-2 mt-4 md:mt-0">
            <a href="{{ route('proveedores.edit', $proveedor->id_proveedor) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-xl hover:bg-yellow-600 transition flex items-center gap-1">
                <x-heroicon-o-pencil-square class="h-5 w-5"/> Editar
            </a>
            <a href="{{ route('proveedores.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition flex items-center gap-1">
                <x-heroicon-o-arrow-uturn-left class="h-5 w-5"/> Volver
            </a>
        </div>
    </div>

    <!-- Info general y ubicación -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white rounded-2xl shadow p-6 flex flex-col gap-2">
            <h3 class="text-lg font-semibold text-blue-700 flex items-center gap-2 mb-2"><x-heroicon-o-identification class="h-5 w-5"/> Información General</h3>
            <div class="flex items-center gap-2"><x-heroicon-o-hashtag class="h-5 w-5 text-blue-400"/> <span class="font-semibold">RUC:</span> {{ $proveedor->ruc }}</div>
            <div class="flex items-center gap-2"><x-heroicon-o-envelope class="h-5 w-5 text-blue-400"/> <span class="font-semibold">Email:</span> {{ $proveedor->email ?? 'No registrado' }}</div>
            <div class="flex items-center gap-2"><x-heroicon-o-phone class="h-5 w-5 text-blue-400"/> <span class="font-semibold">Teléfono:</span> {{ $proveedor->telefono ?? 'No registrado' }}</div>
        </div>
        <div class="bg-white rounded-2xl shadow p-6 flex flex-col gap-2">
            <h3 class="text-lg font-semibold text-blue-700 flex items-center gap-2 mb-2"><x-heroicon-o-map class="h-5 w-5"/> Ubicación</h3>
            <div class="flex items-center gap-2"><x-heroicon-o-map-pin class="h-5 w-5 text-blue-400"/> <span class="font-semibold">Dirección:</span> {{ $proveedor->direccion ?? 'No registrado' }}</div>
            <div class="flex items-center gap-2"><x-heroicon-o-building-office class="h-5 w-5 text-blue-400"/> <span class="font-semibold">Ciudad:</span> {{ $proveedor->ciudad ?? 'No registrado' }}</div>
            <div class="flex items-center gap-2"><x-heroicon-o-building-library class="h-5 w-5 text-blue-400"/> <span class="font-semibold">Departamento:</span> {{ $proveedor->departamento ?? 'No registrado' }}</div>
            <div class="flex items-center gap-2"><x-heroicon-o-user class="h-5 w-5 text-blue-400"/> <span class="font-semibold">Vendedor:</span> {{ $proveedor->vendedor_proveedor ?? 'No registrado' }}</div>
        </div>
    </div>

    <!-- Productos Suministrados -->
    <div class="mb-8">
        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2"><x-heroicon-o-cube class="h-6 w-6 text-blue-500"/> Productos Suministrados</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($proveedor->inventarios as $producto)
                <div class="bg-blue-50 rounded-2xl shadow p-5 flex flex-col gap-2 border border-blue-100 hover:shadow-xl transition-all">
                    <div class="flex items-center justify-between mb-1">
                        <span class="font-mono text-xs text-gray-500">Código: {{ $producto->codigo_producto }}</span>
                        <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-blue-100 text-blue-700 text-xs font-semibold">
                            <x-heroicon-o-tag class="h-4 w-4"/> {{ $producto->categoria->nombre_categoria ?? 'Sin categoría' }}
                        </span>
                    </div>
                    <div class="font-bold text-gray-900 text-base">{{ $producto->nombre_producto }}</div>
                    <div class="flex flex-wrap gap-2 text-sm text-gray-700">
                        <span class="inline-flex items-center gap-1"><x-heroicon-o-cube class="h-4 w-4"/> Stock: {{ $producto->stock_actual }}</span>
                        <span class="inline-flex items-center gap-1 text-emerald-700"><x-heroicon-o-currency-dollar class="h-4 w-4"/> Compra: S/ {{ number_format($producto->precio_compra, 2) }}</span>
                        <span class="inline-flex items-center gap-1 text-blue-700"><x-heroicon-o-currency-dollar class="h-4 w-4"/> Venta: S/ {{ number_format($producto->precio_venta, 2) }}</span>
                    </div>
                    <div class="flex gap-2 mt-2">
                        <a href="{{ route('inventario.show', $producto->id_inventario) }}" class="inline-flex items-center justify-center px-3 py-2 rounded-xl bg-blue-100 text-blue-700 hover:bg-blue-200 transition text-sm font-medium" title="Ver detalles">
                            <x-heroicon-o-eye class="h-5 w-5 mr-1"/> Ver
                        </a>
                        <a href="{{ route('inventario.edit', $producto->id_inventario) }}" class="inline-flex items-center justify-center px-3 py-2 rounded-xl bg-yellow-100 text-yellow-700 hover:bg-yellow-200 transition text-sm font-medium" title="Editar producto">
                            <x-heroicon-o-pencil-square class="h-5 w-5 mr-1"/> Editar
                        </a>
                    </div>
                </div>
            @empty
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-xl text-yellow-800 text-center col-span-full">
                    Este proveedor no tiene productos registrados
                </div>
            @endforelse
        </div>
    </div>

    <!-- Facturas de Compras y productos por lote -->
    <div class="mb-8">
        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2"><x-heroicon-o-document-text class="h-6 w-6 text-indigo-500"/> Facturas de Compras</h3>
        <div class="flex flex-col gap-6">
            @forelse($proveedor->compras as $compra)
                <div class="bg-indigo-50 rounded-2xl shadow p-6 border border-indigo-100">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 mb-2">
                        <div class="flex flex-col gap-1">
                            <span class="text-lg font-bold text-indigo-800 flex items-center gap-2">
                                <x-heroicon-o-receipt-percent class="h-5 w-5"/> Factura: {{ $compra->numero_documento }}
                            </span>
                            <span class="text-sm text-gray-600 flex items-center gap-2"><x-heroicon-o-calendar-days class="h-4 w-4"/> Fecha: @if(is_string($compra->fecha_compra)){{ \Carbon\Carbon::parse($compra->fecha_compra)->format('d/m/Y') }}@else{{ $compra->fecha_compra->format('d/m/Y') }}@endif</span>
                        </div>
                        <div class="flex flex-col gap-1 md:items-end">
                            <span class="text-lg font-bold text-emerald-700 flex items-center gap-2"><x-heroicon-o-currency-dollar class="h-5 w-5"/> Total: S/ {{ number_format($compra->total_compra, 2) }}</span>
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-semibold w-max
                                {{ $compra->estado_pago === 'pagado' ? 'bg-emerald-100 text-emerald-700' : 'bg-yellow-100 text-yellow-700' }}">
                                <x-heroicon-o-check-circle class="h-4 w-4"/>
                                {{ ucfirst($compra->estado_pago) }}
                            </span>
                        </div>
                        <div class="flex gap-2 mt-2 md:mt-0">
                            @php
                                $todosTransferidos = $compra->detalles->count() > 0 && $compra->detalles->every(fn($d) => $d->transferido_inventario);
                                $hayParaTransferir = $compra->detalles->contains(fn($d) => !$d->transferido_inventario);
                            @endphp
                            <a href="{{ route('compras.transferir', $compra->id_compra) }}"
                               class="inline-flex items-center px-3 py-2 bg-blue-600 text-white rounded-md shadow-sm transition text-sm font-medium btn-confirmar-transferencia {{ !$hayParaTransferir ? 'opacity-50 cursor-not-allowed pointer-events-none' : '' }}">
                                <x-heroicon-o-arrow-path class="h-5 w-5 mr-1"/> Transferir a Inventario
                            </a>
                            @if($todosTransferidos)
                                <span class="inline-flex items-center text-green-600 ml-2"><x-heroicon-o-check-circle class="h-5 w-5 mr-1"/> Todos los productos ya fueron transferidos</span>
                            @endif
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="text-md font-semibold text-gray-700 mb-2 flex items-center gap-2"><x-heroicon-o-cube class="h-5 w-5 text-indigo-400"/> Productos de este lote</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @php
                                $productos_lote = $proveedor->detallesCompras->where('id_compra', $compra->id_compra);
                            @endphp
                            @forelse($productos_lote as $detalle)
                                <div class="bg-white rounded-xl shadow p-4 border border-gray-100 flex flex-col gap-1">
                                    <div class="flex items-center justify-between mb-1">
                                        <span class="font-mono text-xs text-gray-500">Código: {{ $detalle->codigo_producto }}</span>
                                        <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-blue-100 text-blue-700 text-xs font-semibold">
                                            <x-heroicon-o-tag class="h-4 w-4"/> {{ $detalle->nombre_producto }}
                                        </span>
                                    </div>
                                    <div class="flex flex-wrap gap-2 text-sm text-gray-700">
                                        <span class="inline-flex items-center gap-1"><x-heroicon-o-clipboard-document-list class="h-4 w-4"/> Marca: {{ $detalle->marca }}</span>
                                        <span class="inline-flex items-center gap-1"><x-heroicon-o-adjustments-horizontal class="h-4 w-4"/> U.M.: {{ $detalle->UM }}</span>
                                        <span class="inline-flex items-center gap-1"><x-heroicon-o-cube class="h-4 w-4"/> Cantidad: {{ $detalle->cantidad }}</span>
                                        <span class="inline-flex items-center gap-1 text-emerald-700"><x-heroicon-o-currency-dollar class="h-4 w-4"/> Precio: S/ {{ number_format($detalle->precio_unitario, 2) }}</span>
                                        <span class="inline-flex items-center gap-1 text-blue-700"><x-heroicon-o-currency-dollar class="h-4 w-4"/> Total: S/ {{ number_format($detalle->total_producto, 2) }}</span>
                                    </div>
                                </div>
                            @empty
                                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-xl text-yellow-800 text-center col-span-full">
                                    No hay productos en este lote
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-xl text-yellow-800 text-center">
                    Este proveedor no tiene compras registradas
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

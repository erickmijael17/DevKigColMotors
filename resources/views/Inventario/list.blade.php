@extends('components.layout')

@section('titulo', 'Inventario')
@section('subtitulo', 'Gestión y control de productos en almacén')

@section('contenido')
<div class="max-w-7xl mx-auto p-4">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Lista de Inventario</h1>
        <div class="flex flex-col sm:flex-row gap-2 items-stretch sm:items-center">
            <form method="GET" action="{{ route('inventario.index') }}" class="flex items-center gap-2">
                <select name="categoria_seleccionada" class="px-3 py-2 border rounded-xl bg-white shadow focus:ring-2 focus:ring-blue-500">
                    <option value="">Todas las categorías</option>
                    @foreach($todas_las_categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}" {{ request('categoria_seleccionada') == $categoria->id_categoria ? 'selected' : '' }}>{{ $categoria->nombre_categoria }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-xl transition">Filtrar</button>
            </form>
            <a href="{{ route('inventario.exportar.pdf', array_filter(['categoria_seleccionada' => request('categoria_seleccionada')])) }}" class="bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded-xl transition flex items-center gap-2" target="_blank">
                <x-heroicon-o-document-arrow-down class="h-5 w-5"/> Exportar PDF
            </a>
            <a href="{{ route('inventario.create') }}" class="px-4 py-2 bg-emerald-600 text-white rounded-xl shadow hover:bg-emerald-700 transition-all flex items-center gap-2">
                <x-heroicon-o-plus class="h-5 w-5"/> Agregar Nuevo Ítem
            </a>
            <button id="btn-editar-precios-categoria" class="bg-yellow-600 hover:bg-yellow-700 text-white font-medium px-4 py-2 rounded-xl transition">Editar precios por categoría</button>
            <button id="btn-poner-en-venta-todo" class="bg-blue-900 hover:bg-blue-950 text-white font-medium px-4 py-2 rounded-xl transition">Poner en venta TODO el inventario</button>
        </div>
    </div>
    @if($lista_inventario->count())
    <!-- Encabezado tipo tabla solo en escritorio -->
    <div class="hidden md:block overflow-x-auto bg-white rounded-2xl shadow-lg mb-2">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-blue-50 to-blue-100 sticky top-0 z-10">
                <tr>
                    <th class="px-2 py-3"><input type="checkbox" id="check-todos"></th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Código</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Categoría</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Proveedor</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Stock</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Compra (S/)</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Venta (S/)</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
    <!-- Cards responsivas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($lista_inventario as $producto_inventario)
            <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col gap-3 border border-gray-100 hover:shadow-xl transition-all">
                <div class="flex items-center justify-between mb-2">
                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">Código: {{ $producto_inventario->codigo_producto }}</span>
                    @if($producto_inventario->estado === 'disponible')
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">Disponible</span>
                    @else
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">Agotado</span>
                    @endif
                </div>
                <h2 class="text-xl font-bold text-gray-800 mb-1">{{ $producto_inventario->nombre_producto }}</h2>
                <div class="flex flex-col gap-1 text-sm text-gray-700 mb-2">
                    <div><span class="font-semibold">Proveedor:</span> {{ $producto_inventario->proveedor->nombre_proveedor ?? 'Sin proveedor' }}</div>
                    <div><span class="font-semibold">Categoría:</span> {{ $producto_inventario->categoria->nombre_categoria ?? 'Sin categoría' }}</div>
                    <div><span class="font-semibold">Stock:</span> {{ $producto_inventario->stock_actual }}</div>
                </div>
                <div class="flex flex-col gap-1 text-sm mb-2">
                    <div><span class="font-semibold text-emerald-700">Compra:</span> <span class="font-bold">S/ {{ number_format($producto_inventario->precio_compra, 2) }}</span></div>
                    <div><span class="font-semibold text-blue-700">Venta:</span> <span class="font-bold">S/ {{ number_format($producto_inventario->precio_venta, 2) }}</span></div>
                </div>
                <div class="flex gap-2 mt-2">
                    <a href="{{ route('inventario.show', $producto_inventario->id_inventario) }}" class="inline-flex items-center justify-center px-3 py-2 rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-100 transition text-sm font-medium" title="Ver detalles">
                        <x-heroicon-o-eye class="h-5 w-5 mr-1"/> Ver detalles
                    </a>
                    <a href="{{ route('inventario.edit', $producto_inventario->id_inventario) }}" class="inline-flex items-center justify-center px-3 py-2 rounded-xl bg-yellow-50 text-yellow-600 hover:bg-yellow-100 transition text-sm font-medium" title="Editar">
                        <x-heroicon-o-pencil-square class="h-5 w-5 mr-1"/> Editar
                    </a>
                    <form action="{{ route('inventario.destroy', $producto_inventario->id_inventario) }}" method="POST" class="inline form-eliminar">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center justify-center px-3 py-2 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 transition text-sm font-medium" title="Eliminar">
                            <x-heroicon-o-trash class="h-5 w-5 mr-1"/> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $lista_inventario->links() }}
    </div>
    @else
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-xl text-yellow-800">
            No hay ítems de inventario disponibles.
        </div>
    @endif
</div>
<!-- Modal edición por categoría -->
<div id="modal-precios-categoria" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md">
        <h2 class="text-xl font-bold mb-4">Editar precios por categoría</h2>
        <form id="form-precios-categoria" method="POST" action="{{ route('inventario.editar_precios_categoria') }}">
            @csrf
            <div class="mb-4">
                <label class="block font-medium mb-1">Categoría:</label>
                <select name="id_categoria" id="select-categoria-precio" class="border rounded px-3 py-2 w-full">
                    <option value="">Selecciona una categoría</option>
                    @foreach($todas_las_categorias as $cat)
                        <option value="{{ $cat->id_categoria }}">{{ $cat->nombre_categoria }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-1">Nuevo precio de venta:</label>
                <input type="number" name="nuevo_precio" step="0.01" min="0" class="border rounded px-3 py-2 w-full" required>
            </div>
            <div id="resumen-categoria" class="mb-4 text-sm text-gray-600"></div>
            <div id="tabla-productos-categoria" class="mb-4 hidden">
                <table class="min-w-full divide-y divide-gray-200 text-xs">
                    <thead><tr><th>Producto</th><th>Precio compra</th><th>Precio venta actual</th></tr></thead>
                    <tbody id="tbody-productos-categoria"></tbody>
                </table>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" id="cerrar-modal-precios-categoria" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-6 rounded-xl transition-all">Cancelar</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-xl transition-all">Actualizar precios</button>
            </div>
        </form>
    </div>
</div>
<form id="form-venta-todo" method="POST" action="{{ route('inventario.poner_en_venta_categoria') }}" style="display:none;">
    @csrf
    <input type="hidden" name="id_categoria" value="*">
</form>
<!-- Modal de confirmación para poner en venta todo -->
<div id="modal-confirmar-venta-todo" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md text-center">
        <h2 class="text-xl font-bold mb-4">¿Estás seguro?</h2>
        <p class="mb-6">Esto pondrá en venta <b>todos los productos</b> del inventario. Esta acción es masiva y no se puede deshacer fácilmente.</p>
        <div class="flex justify-center gap-4">
            <button type="button" id="cancelar-venta-todo" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-6 rounded-xl transition-all">Cancelar</button>
            <button type="button" id="confirmar-venta-todo" class="bg-blue-700 hover:bg-blue-800 text-white font-medium py-2 px-6 rounded-xl transition-all">Sí, poner todo en venta</button>
        </div>
    </div>
</div>
@php
    $productosPorCategoria = [];
    foreach ($todas_las_categorias as $cat) {
        $productosPorCategoria[$cat->id_categoria] = $lista_inventario->where('id_categoria', $cat->id_categoria)
            ->map(function($p){
                return [
                    'nombre' => $p->nombre_producto,
                    'precio_compra' => number_format($p->precio_compra, 2),
                    'precio_venta' => number_format($p->precio_venta, 2)
                ];
            
            })->values();
    }
@endphp
<script>
const productosPorCategoria = @json($productosPorCategoria);
// Selección múltiple
const checkTodos = document.getElementById('check-todos');
const checks = document.querySelectorAll('.check-producto');
checkTodos && checkTodos.addEventListener('change', function() {
    checks.forEach(c => c.checked = this.checked);
});
// Mapeo de productos por categoría
const btnEditarPreciosCat = document.getElementById('btn-editar-precios-categoria');
const modalPreciosCat = document.getElementById('modal-precios-categoria');
const cerrarModalPreciosCat = document.getElementById('cerrar-modal-precios-categoria');
const selectCategoriaPrecio = document.getElementById('select-categoria-precio');
const resumenCategoria = document.getElementById('resumen-categoria');
const tabla = document.getElementById('tabla-productos-categoria');
const tbody = document.getElementById('tbody-productos-categoria');
btnEditarPreciosCat && btnEditarPreciosCat.addEventListener('click', function() {
    modalPreciosCat.classList.remove('hidden');
});
cerrarModalPreciosCat && cerrarModalPreciosCat.addEventListener('click', function() {
    modalPreciosCat.classList.add('hidden');
});
selectCategoriaPrecio && selectCategoriaPrecio.addEventListener('change', function() {
    const idCat = this.value;
    const productos = productosPorCategoria[idCat] || [];
    const count = productos.length;
    resumenCategoria.innerText = count ? `Se actualizarán ${count} productos de esta categoría.` : '';
    if (count && productos.length) {
        tabla.classList.remove('hidden');
        tbody.innerHTML = '';
        productos.forEach(p => {
            tbody.innerHTML += `<tr><td>${p.nombre}</td><td>S/ ${p.precio_compra}</td><td>S/ ${p.precio_venta}</td></tr>`;
        });
    } else {
        tabla.classList.add('hidden');
        tbody.innerHTML = '';
    }
});
// Poner en venta por categoría
const btnPonerEnVentaTodo = document.getElementById('btn-poner-en-venta-todo');
const modalConfirmarVentaTodo = document.getElementById('modal-confirmar-venta-todo');
const cancelarVentaTodo = document.getElementById('cancelar-venta-todo');
const confirmarVentaTodo = document.getElementById('confirmar-venta-todo');
const formVentaTodo = document.getElementById('form-venta-todo');
btnPonerEnVentaTodo && btnPonerEnVentaTodo.addEventListener('click', function() {
    modalConfirmarVentaTodo.classList.remove('hidden');
});
cancelarVentaTodo && cancelarVentaTodo.addEventListener('click', function() {
    modalConfirmarVentaTodo.classList.add('hidden');
});
confirmarVentaTodo && confirmarVentaTodo.addEventListener('click', function() {
    formVentaTodo.submit();
});
</script>
@endsection

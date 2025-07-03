@extends('components.layout')

@section('titulo', 'Panel de Ventas')
@section('subtitulo', 'Gestión y análisis de ventas y productos en venta')

@section('contenido')
<div class="max-w-7xl mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
        <x-dashboard.stats-card
            title="Ventas Totales (30 días)"
            :value="'S/ ' . number_format($ventasTotales, 2)"
            percentage=""
            trend="up"
            icon="currency-dollar"
            color="green"
            description="Últimos 30 días"
        />
        <x-dashboard.stats-card
            title="Productos en Venta"
            :value="$productosEnVenta->count()"
            percentage=""
            trend="up"
            icon="cube"
            color="blue"
            description="Activos"
        />
        <x-dashboard.stats-card
            title="Stock Total en Venta"
            :value="$stockTotal"
            percentage=""
            trend="up"
            icon="archive-box"
            color="orange"
            description="Unidades disponibles"
        />
        <x-dashboard.stats-card
            title="Productos Más Vendidos"
            :value="$productosMasVendidos->sum('cantidad_vendida')"
            percentage=""
            trend="up"
            icon="chart-bar"
            color="purple"
            description="Top 5"
        />
    </div>
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-8">
        <div class="tarjeta-grafico bg-white rounded-2xl shadow-lg p-0 overflow-hidden border border-gray-100">
            <div class="px-6 pt-6 pb-2 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-gray-100">
                <h3 class="text-lg font-bold text-blue-800 flex items-center gap-2">
                    <x-heroicon-o-chart-bar class="h-6 w-6 text-blue-400"/> Ventas por Mes
                </h3>
            </div>
            <div class="p-6">
                <canvas id="grafico-ventas" style="height: 300px;"></canvas>
            </div>
        </div>
        <div class="tarjeta-grafico bg-white rounded-2xl shadow-lg p-0 overflow-hidden border border-gray-100">
            <div class="px-6 pt-6 pb-2 bg-gradient-to-r from-purple-50 to-purple-100 border-b border-gray-100">
                <h3 class="text-lg font-bold text-purple-800 flex items-center gap-2">
                    <x-heroicon-o-cube class="h-6 w-6 text-purple-400"/> Productos Más Vendidos
                </h3>
            </div>
            <div class="p-6">
                <canvas id="grafico-productos" style="height: 300px;"></canvas>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-6 shadow mb-8">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Productos en Venta</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-blue-50 to-blue-100 sticky top-0 z-10">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Categoría</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Precio Venta</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Stock Actual</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Estado</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($productosEnVenta as $producto)
                        <tr>
                            <td class="px-6 py-4">{{ $producto->nombre_producto }}</td>
                            <td class="px-6 py-4">{{ $producto->categoria->nombre_categoria ?? 'Sin categoría' }}</td>
                            <td class="px-6 py-4 font-mono text-blue-700 font-bold">S/ {{ number_format($producto->precio_venta, 2) }}</td>
                            <td class="px-6 py-4">{{ $producto->inventario->stock_actual ?? 'N/A' }}</td>
                            <td class="px-6 py-4">
                                @if($producto->estado === 'activo')
                                    <span class="inline-flex items-center px-2 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-semibold">Activo</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">Inactivo</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-6 shadow mb-8">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Ventas Recientes</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-green-50 to-green-100 sticky top-0 z-10">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">N° Venta</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Fecha</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Estado</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($ventasRecientes as $venta)
                        <tr>
                            <td class="px-6 py-4">{{ $venta->numero_venta }}</td>
                            <td class="px-6 py-4">{{ $venta->fecha_venta }}</td>
                            <td class="px-6 py-4 font-mono text-blue-700 font-bold">S/ {{ number_format($venta->total_venta, 2) }}</td>
                            <td class="px-6 py-4">
                                @if($venta->estado_venta === 'confirmado')
                                    <span class="inline-flex items-center px-2 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-semibold">Confirmado</span>
                                @elseif($venta->estado_venta === 'pendiente')
                                    <span class="inline-flex items-center px-2 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold">Pendiente</span>
                                @elseif($venta->estado_venta === 'cancelado')
                                    <span class="inline-flex items-center px-2 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">Cancelado</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-semibold">{{ ucfirst($venta->estado_venta) }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Gráfico de Ventas por Mes
const ctxVentas = document.getElementById('grafico-ventas').getContext('2d');
new Chart(ctxVentas, {
    type: 'line',
    data: {
        labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        datasets: [{
            label: 'Ventas',
            data: @json(array_values($ventasPorMes->toArray())),
            borderColor: '#3b82f6',
            backgroundColor: 'rgba(59, 130, 246, 0.1)',
            borderWidth: 3,
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
            y: { beginAtZero: true, ticks: { color: '#64748b' } },
            x: { ticks: { color: '#64748b' } }
        }
    }
});
// Gráfico de Productos Más Vendidos
const ctxProductos = document.getElementById('grafico-productos').getContext('2d');
new Chart(ctxProductos, {
    type: 'doughnut',
    data: {
        labels: @json($productosMasVendidos->pluck('nombre_producto')->toArray()),
        datasets: [{
            data: @json($productosMasVendidos->pluck('cantidad_vendida')->toArray()),
            backgroundColor: [
                '#3b82f6', '#6366f1', '#fbbf24', '#f87171', '#10b981'
            ],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'right',
                labels: { color: '#64748b', usePointStyle: true, padding: 20 }
            }
        }
    }
});
</script>
@endsection

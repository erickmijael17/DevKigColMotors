@extends('components.layout')

@section('titulo', 'Dashboard Principal')
@section('subtitulo', 'Bienvenido, aquí tienes un resumen completo de tu negocio')

@section('contenido')
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
    <x-dashboard.stats-card
        title="Ventas Totales (30 días)"
        :value="'S/ ' . number_format($ventasTotales, 2)"
        percentage=""
        trend="up"
        icon="currency-dollar"
        color="green"
        description="Ventas reales"
    />
    <x-dashboard.stats-card
        title="Productos en Inventario"
        :value="$totalInventario"
        percentage=""
        trend="up"
        icon="cube"
        color="blue"
        description="Total ítems en almacén"
    />
    <x-dashboard.stats-card
        title="Stock Total Inventario"
        :value="$stockTotalInventario"
        percentage=""
        trend="up"
        icon="archive-box"
        color="orange"
        description="Unidades en almacén"
    />
    <x-dashboard.stats-card
        title="Productos en Venta"
        :value="$totalProductosEnVenta"
        percentage=""
        trend="up"
        icon="shopping-bag"
        color="purple"
        description="Activos en venta"
    />
</div>
<div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-8">
    <div class="tarjeta-grafico bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-0 overflow-hidden border border-gray-100">
        <div class="px-6 pt-6 pb-2 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-gray-100">
            <h3 class="text-lg font-bold text-blue-800 flex items-center gap-2">
                <x-heroicon-o-chart-bar class="h-6 w-6 text-blue-400"/> Ventas por Mes
            </h3>
        </div>
        <div class="p-6">
            <canvas id="grafico-ventas" style="height: 300px;"></canvas>
        </div>
    </div>
    <div class="tarjeta-grafico bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-0 overflow-hidden border border-gray-100">
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
    <h3 class="text-lg font-bold text-gray-900 mb-4">Actividad Reciente</h3>
    <div class="space-y-4">
        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl">
            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                <x-heroicon-o-shopping-bag class="h-5 w-5 text-white"/>
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-900">Nueva venta realizada</p>
                <p class="text-xs text-gray-500">Producto: Laptop HP - $1,249.99</p>
            </div>
            <span class="text-xs text-gray-400">hace 2 min</span>
        </div>
        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl">
            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                <x-heroicon-o-user-plus class="h-5 w-5 text-white"/>
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-900">Nuevo usuario registrado</p>
                <p class="text-xs text-gray-500">María González se unió al sistema</p>
            </div>
            <span class="text-xs text-gray-400">hace 5 min</span>
        </div>
        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl">
            <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center">
                <x-heroicon-o-exclamation-triangle class="h-5 w-5 text-white"/>
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-900">Stock bajo detectado</p>
                <p class="text-xs text-gray-500">Producto: Mouse Gamer - 5 unidades restantes</p>
            </div>
            <span class="text-xs text-gray-400">hace 10 min</span>
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

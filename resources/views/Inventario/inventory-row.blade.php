<tr>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-mono">{{ $inventory->codigo_producto }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $inventory->nombre_producto }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $inventory->categoria->nombre_categoria ?? 'Sin categoría' }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $inventory->proveedor->nombre_proveedor ?? 'Sin proveedor' }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">{{ $inventory->stock_actual }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
        <span class="inline-flex items-center gap-1">
            <span class="font-semibold text-emerald-700">S/</span> {{ number_format($inventory->precio_compra, 2) }} <span class="text-xs text-gray-500">Compra</span>
        </span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
        <span class="inline-flex items-center gap-1">
            <span class="font-semibold text-blue-700">S/</span> {{ number_format($inventory->precio_venta, 2) }} <span class="text-xs text-gray-500">Venta</span>
        </span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-center">
        @if($inventory->estado === 'disponible')
            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">Disponible</span>
        @else
            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">Agotado</span>
        @endif
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
        <a href="{{ route('inventario.show', $inventory->id_inventario) }}" class="inline-flex items-center justify-center p-2 rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-100 transition" title="Ver detalles">
            <x-heroicon-o-eye class="h-5 w-5"/>
        </a>
        <a href="{{ route('inventario.edit', $inventory->id_inventario) }}" class="inline-flex items-center justify-center p-2 rounded-xl bg-yellow-50 text-yellow-600 hover:bg-yellow-100 transition" title="Editar">
            <x-heroicon-o-pencil-square class="h-5 w-5"/>
        </a>
        <form action="{{ route('inventario.destroy', $inventory->id_inventario) }}" method="POST" class="inline form-eliminar">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center justify-center p-2 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 transition" title="Eliminar">
                <x-heroicon-o-trash class="h-5 w-5"/>
            </button>
        </form>
    </td>
</tr>

@extends('components.layout')

@section('titulo', 'Proveedores')
@section('subtitulo', 'Gestión y control de proveedores')

@section('contenido')
<div class="max-w-7xl mx-auto p-4">
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <form action="{{ route('proveedores.importar') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2 bg-white p-4 rounded-xl shadow">
            @csrf
            <label class="font-medium text-gray-700">Importar por CSV:</label>
            <input type="file" name="archivo_csv" accept=".csv,text/csv" required class="border border-gray-300 rounded-xl px-2 py-1 focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-xl transition">Importar</button>
        </form>
        <a href="{{ route('proveedores.create') }}" class="px-4 py-2 bg-emerald-600 text-white rounded-xl shadow hover:bg-emerald-700 transition-all flex items-center gap-2">
            <x-heroicon-o-plus class="h-5 w-5"/> Agregar Nuevo Proveedor
        </a>
    </div>
    @if(session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-xl mb-4">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-800 p-4 rounded-xl mb-4">{{ session('error') }}</div>
    @endif
    @if(session('info'))
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-800 p-4 rounded-xl mb-4">{{ session('info') }}</div>
    @endif
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Lista de Proveedores</h1>
    </div>
    @if($proveedores->count())
    <div class="hidden md:block overflow-x-auto bg-white rounded-2xl shadow-lg mb-2">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-blue-50 to-blue-100 sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">RUC</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Teléfono</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Ciudad</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($proveedores as $proveedor)
                    <tr>
                        <td class="px-6 py-4">{{ $proveedor->nombre_proveedor }}</td>
                        <td class="px-6 py-4">{{ $proveedor->ruc }}</td>
                        <td class="px-6 py-4">{{ $proveedor->telefono ?? 'No registrado' }}</td>
                        <td class="px-6 py-4">{{ $proveedor->ciudad ?? 'No registrado' }}</td>
                        <td class="px-6 py-4">
                            @if($proveedor->estado === 'activo')
                                <span class="inline-flex items-center px-2 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-semibold">Activo</span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">Inactivo</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('proveedores.show', $proveedor->id_proveedor) }}" class="inline-flex items-center justify-center p-2 rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-100 transition" title="Ver detalles">
                                <x-heroicon-o-eye class="h-5 w-5"/>
                            </a>
                            <a href="{{ route('proveedores.edit', $proveedor->id_proveedor) }}" class="inline-flex items-center justify-center p-2 rounded-xl bg-yellow-50 text-yellow-600 hover:bg-yellow-100 transition" title="Editar">
                                <x-heroicon-o-pencil-square class="h-5 w-5"/>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Cards responsivas en móvil -->
    <div class="grid grid-cols-1 md:hidden gap-6">
        @foreach($proveedores as $proveedor)
            <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col gap-3 border border-gray-100 hover:shadow-xl transition-all">
                <h2 class="text-lg font-bold text-gray-800 mb-1">{{ $proveedor->nombre_proveedor }}</h2>
                <div class="flex flex-col gap-1 text-sm text-gray-700 mb-2">
                    <div><span class="font-semibold">RUC:</span> {{ $proveedor->ruc }}</div>
                    <div><span class="font-semibold">Teléfono:</span> {{ $proveedor->telefono ?? 'No registrado' }}</div>
                    <div><span class="font-semibold">Ciudad:</span> {{ $proveedor->ciudad ?? 'No registrado' }}</div>
                    <div><span class="font-semibold">Estado:</span>
                        @if($proveedor->estado === 'activo')
                            <span class="inline-flex items-center px-2 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-semibold">Activo</span>
                        @else
                            <span class="inline-flex items-center px-2 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">Inactivo</span>
                        @endif
                    </div>
                </div>
                <div class="flex gap-2 mt-2">
                    <a href="{{ route('proveedores.show', $proveedor->id_proveedor) }}" class="inline-flex items-center justify-center px-3 py-2 rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-100 transition text-sm font-medium" title="Ver detalles">
                        <x-heroicon-o-eye class="h-5 w-5 mr-1"/> Ver detalles
                    </a>
                    <a href="{{ route('proveedores.edit', $proveedor->id_proveedor) }}" class="inline-flex items-center justify-center px-3 py-2 rounded-xl bg-yellow-50 text-yellow-600 hover:bg-yellow-100 transition text-sm font-medium" title="Editar">
                        <x-heroicon-o-pencil-square class="h-5 w-5 mr-1"/> Editar
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $proveedores->links() }}
    </div>
    @else
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-xl text-yellow-800">
            No hay proveedores registrados.
        </div>
    @endif
</div>
@endsection

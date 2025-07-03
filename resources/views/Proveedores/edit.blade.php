@extends('components.layout')

@section('titulo', 'Editar Proveedor')
@section('subtitulo', 'Modifica los datos del proveedor seleccionado')

@section('contenido')
<div class="max-w-xl mx-auto bg-white rounded-2xl shadow-lg p-8 mt-8">
    <div class="mb-6">
        <a href="{{ route('proveedores.index') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold px-4 py-2 rounded-xl transition-all bg-blue-50 hover:bg-blue-100 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Volver
        </a>
    </div>
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Editar Proveedor</h2>
    <form action="{{ route('proveedores.update', $proveedor->id_proveedor) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="relative">
            <input type="text" name="nombre_proveedor" id="nombre_proveedor" value="{{ old('nombre_proveedor', $proveedor->nombre_proveedor) }}" required class="input-flotante peer w-full px-3 py-3 border border-gray-300 rounded-xl bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder=" " autofocus>
            <label for="nombre_proveedor" class="label-flotante">Nombre del proveedor <span class="text-red-500">*</span></label>
            @error('nombre_proveedor')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="relative">
            <input type="text" name="ruc" id="ruc" value="{{ old('ruc', $proveedor->ruc) }}" required class="input-flotante peer w-full px-3 py-3 border border-gray-300 rounded-xl bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder=" ">
            <label for="ruc" class="label-flotante">RUC <span class="text-red-500">*</span></label>
            @error('ruc')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="relative">
            <input type="email" name="email" id="email" value="{{ old('email', $proveedor->email) }}" class="input-flotante peer w-full px-3 py-3 border border-gray-300 rounded-xl bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder=" ">
            <label for="email" class="label-flotante">Correo electrónico</label>
            @error('email')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="relative">
            <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $proveedor->telefono) }}" class="input-flotante peer w-full px-3 py-3 border border-gray-300 rounded-xl bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder=" ">
            <label for="telefono" class="label-flotante">Teléfono</label>
            @error('telefono')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="relative">
            <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $proveedor->direccion) }}" class="input-flotante peer w-full px-3 py-3 border border-gray-300 rounded-xl bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder=" ">
            <label for="direccion" class="label-flotante">Dirección</label>
            @error('direccion')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="relative">
            <input type="text" name="ciudad" id="ciudad" value="{{ old('ciudad', $proveedor->ciudad) }}" class="input-flotante peer w-full px-3 py-3 border border-gray-300 rounded-xl bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder=" ">
            <label for="ciudad" class="label-flotante">Ciudad</label>
            @error('ciudad')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="relative">
            <input type="text" name="departamento" id="departamento" value="{{ old('departamento', $proveedor->departamento) }}" class="input-flotante peer w-full px-3 py-3 border border-gray-300 rounded-xl bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder=" ">
            <label for="departamento" class="label-flotante">Departamento</label>
            @error('departamento')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="relative">
            <input type="text" name="vendedor_proveedor" id="vendedor_proveedor" value="{{ old('vendedor_proveedor', $proveedor->vendedor_proveedor) }}" class="input-flotante peer w-full px-3 py-3 border border-gray-300 rounded-xl bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder=" ">
            <label for="vendedor_proveedor" class="label-flotante">Vendedor asignado</label>
            @error('vendedor_proveedor')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="flex justify-end gap-2 mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">Guardar Cambios</button>
            <a href="{{ route('proveedores.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-6 rounded-xl transition-all">Cancelar</a>
        </div>
    </form>
    <style>
        .input-flotante:focus ~ .label-flotante,
        .input-flotante:not(:placeholder-shown) ~ .label-flotante {
            transform: translateY(-1.7rem) scale(0.90);
            color: #2563eb;
            background: #fff;
            padding: 0 0.3rem;
            left: 0.8rem;
        }
        .label-flotante {
            position: absolute;
            left: 1rem;
            top: 1.1rem;
            pointer-events: none;
            color: #64748b;
            font-size: 1rem;
            background: transparent;
            transition: all 0.2s cubic-bezier(0.4,0,0.2,1);
            z-index: 10;
        }
        .input-flotante {
            background: transparent;
        }
    </style>
</div>
@endsection

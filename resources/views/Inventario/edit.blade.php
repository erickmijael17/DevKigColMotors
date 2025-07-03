@extends('components.layout')

@section('titulo', 'Editar Producto del Inventario')
@section('subtitulo', 'Modifica los datos del producto seleccionado')

@section('contenido')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8 mt-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-900">Editar Producto</h2>
    <x-dynamic-form :formulario="$formulario" action="{{ route('inventario.update', $inventario->id_inventario) }}" method="POST" submitText="Actualizar" />
    <form action="{{ route('inventario.update', $inventario->id_inventario) }}" method="POST" style="display:none;">@csrf @method('PUT')</form>
</div>
@endsection

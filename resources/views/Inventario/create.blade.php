@extends('components.layout')

@section('titulo', 'Agregar Producto al Inventario')
@section('subtitulo', 'Completa el formulario para registrar un nuevo producto')

@section('contenido')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8 mt-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-900">Nuevo Producto</h2>
    <x-dynamic-form :formulario="$formulario" action="{{ route('inventario.store') }}" method="POST" submitText="Guardar" />
</div>
@endsection

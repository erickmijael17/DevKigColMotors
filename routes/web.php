<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Login;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Opción 1: Usar resource para definir todas las rutas CRUD de una vez
Route::resource('inventario', InventarioController::class);

// Opción 2: Si prefieres definir las rutas manualmente

Route::controller(InventarioController::class)->group(function () {
    Route::get('/inventario', 'index')->name('inventario.index');
    Route::get('/inventario/create', 'create')->name('inventario.create');
    Route::post('/inventario', 'store')->name('inventario.store');
    Route::get('/inventario/{inventario}', 'show')->name('inventario.show');
    Route::get('/inventario/{inventario}/edit', 'edit')->name('inventario.edit');
    Route::put('/inventario/{inventario}', 'update')->name('inventario.update');
    Route::delete('/inventario/{inventario}', 'destroy')->name('inventario.destroy');
    Route::get('/inventario/exportar/pdf', 'exportarPDF')->name('inventario.exportar.pdf');
    Route::post('/inventario/editar-precios-masivo', 'editarPreciosMasivo')->name('inventario.editar_precios_masivo');
    Route::post('/inventario/poner-en-venta-masivo', 'ponerEnVentaMasivo')->name('inventario.poner_en_venta_masivo');
    Route::post('/inventario/editar-precios-categoria', 'editarPreciosPorCategoria')->name('inventario.editar_precios_categoria');
    Route::post('/inventario/poner-en-venta-categoria', 'ponerEnVentaPorCategoria')->name('inventario.poner_en_venta_categoria');
});

Route::controller(\App\Http\Controllers\ProveedorController::class)->group(function () {
    Route::get('/proveedores', 'index')->name('proveedores.index');
    Route::get('/proveedores/create', 'create')->name('proveedores.create');
    Route::post('/proveedores', 'store')->name('proveedores.store');
    Route::get('/proveedores/{proveedor}', 'show')->name('proveedores.show');
    Route::get('/proveedores/{proveedor}/edit', 'edit')->name('proveedores.edit');
    Route::put('/proveedores/{proveedor}', 'update')->name('proveedores.update');
    Route::delete('/proveedores/{proveedor}', 'destroy')->name('proveedores.destroy');
});


Route::post('/proveedores/importar', [App\Http\Controllers\ProveedorController::class, 'importar'])->name('proveedores.importar');
Route::get('/compras/{id}/transferir', [App\Http\Controllers\CompraProveedorController::class, 'transferirAInventario'])
    ->name('compras.transferir');

Route::controller(VentasController::class)->group(function () {
    Route::get('/ventas', 'index')->name('ventas.index');
    // Puedes agregar más rutas de ventas aquí si lo necesitas
});

Route::get('/login', Login::class)->name('login');

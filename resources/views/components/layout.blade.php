{{-- resources/views/components/layout.blade.php --}}
<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo', 'Panel de Administración')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .barra-lateral {
            background: linear-gradient(180deg, #232946 0%, #121629 100%);
            color: #fff;
            box-shadow: 2px 0 24px 0 rgba(35,41,70,0.10);
        }
        .barra-lateral .enlace-menu {
            color: #cbd5e1;
            border-radius: 1rem;
            transition: all 0.2s cubic-bezier(0.4,0,0.2,1);
            font-weight: 500;
        }
        .barra-lateral .enlace-menu:hover {
            background: rgba(59,130,246,0.10);
            color: #3b82f6;
        }
        .barra-lateral .enlace-activo {
            background: linear-gradient(90deg, #3b82f6 0%, #6366f1 100%);
            color: #fff !important;
            box-shadow: 0 4px 24px rgba(59,130,246,0.15);
        }
        .barra-lateral .enlace-menu svg {
            color: #94a3b8;
            transition: color 0.2s;
        }
        .barra-lateral .enlace-activo svg {
            color: #fff;
        }
        .barra-lateral .logo-contenedor {
            background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
        }
        .perfil-usuario {
            background: rgba(59,130,246,0.08);
            border: 1px solid rgba(59,130,246,0.10);
        }
        .perfil-usuario:hover {
            background: rgba(59,130,246,0.15);
        }
        .avatar-usuario {
            border: 2px solid #3b82f6;
            box-shadow: 0 2px 12px rgba(59,130,246,0.12);
            transition: transform 0.2s;
        }
        .avatar-usuario:hover {
            transform: scale(1.08) rotate(-2deg);
        }
        .cabecera-principal {
            background: #fff;
            box-shadow: 0 2px 16px 0 rgba(35,41,70,0.08);
            border-bottom: 1px solid #e5e7eb;
        }
        .buscador-moderno {
            background: #f4f6fb;
            border: 1.5px solid #3b82f6;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .buscador-moderno:focus-within {
            background: #fff;
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
            transform: scale(1.02);
        }
    </style>
</head>
<body class="bg-gray-50 antialiased">
<div class="flex min-h-screen">
    <!-- Barra lateral -->
    <aside class="barra-lateral fixed inset-y-0 left-0 z-50 w-64 shadow-xl border-r border-gray-200 transform transition-transform duration-300 ease-in-out lg:translate-x-0">
        <div class="flex flex-col h-full">
            <!-- Logo -->
            <div class="flex items-center justify-center p-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="logo-contenedor w-10 h-10 rounded-xl flex items-center justify-center">
                        <x-heroicon-o-cube class="h-6 w-6 text-white" />
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">Empresa Roncco</h1>
                        <p class="text-xs text-gray-200">Panel Administrativo</p>
                    </div>
                </div>
            </div>
            <!-- Menú -->
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('dashboard') }}" class="enlace-menu flex items-center space-x-4 px-4 py-3 @if(request()->routeIs('dashboard')) enlace-activo @endif">
                    <x-heroicon-o-home class="h-5 w-5"/>
                    <span>Panel Principal</span>
                </a>
                <a href="{{ route('inventario.index') }}" class="enlace-menu flex items-center space-x-4 px-4 py-3 @if(request()->routeIs('inventario.*')) enlace-activo @endif">
                    <x-heroicon-o-cube class="h-5 w-5"/>
                    <span>Inventario</span>
                </a>
                <a href="{{ route('ventas.index') }}" class="enlace-menu flex items-center space-x-4 px-4 py-3 @if(request()->routeIs('ventas.*')) enlace-activo @endif">
                    <x-heroicon-o-shopping-bag class="h-5 w-5"/>
                    <span>Ventas</span>
                </a>
                <a href="#" class="enlace-menu flex items-center space-x-4 px-4 py-3">
                    <x-heroicon-o-users class="h-5 w-5"/>
                    <span>Usuarios</span>
                </a>
                <a href="{{ route('proveedores.index') }}" class="enlace-menu flex items-center space-x-4 px-4 py-3 @if(request()->routeIs('proveedores.*')) enlace-activo @endif">
                    <x-heroicon-o-truck class="h-5 w-5"/>
                    <span>Proveedores</span>
                </a>
                <a href="#" class="enlace-menu flex items-center space-x-4 px-4 py-3">
                    <x-heroicon-o-cog-6-tooth class="h-5 w-5"/>
                    <span>Configuración</span>
                </a>
            </nav>
            <!-- Perfil usuario -->
            <div class="p-4 border-t border-gray-200">
                <div class="perfil-usuario flex items-center space-x-3 p-3 rounded-xl hover:bg-white hover:bg-opacity-10 cursor-pointer transition-colors">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face"
                         alt="Avatar" class="avatar-usuario w-10 h-10 rounded-full">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white">Juan Pérez</p>
                        <p class="text-xs text-gray-200">Administrador</p>
                    </div>
                    <x-heroicon-o-ellipsis-vertical class="h-5 w-5 text-gray-200" />
                </div>
            </div>
        </div>
    </aside>
    <!-- Contenido principal -->
    <main class="flex-1 lg:ml-64">
        <!-- Cabecera -->
        <header class="cabecera-principal sticky top-0 z-40">
            <div class="px-6 py-4 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">@yield('titulo', 'Panel de Administración')</h1>
                    <p class="text-sm text-gray-600 mt-1">@yield('subtitulo', 'Bienvenido al sistema de gestión')</p>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Buscador -->
                    <div class="relative">
                        <x-heroicon-o-magnifying-glass class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" />
                        <input type="text" placeholder="Buscar..." class="buscador-moderno pl-10 pr-4 py-2 rounded-xl w-64 text-gray-900 placeholder-gray-500">
                    </div>
                    <!-- Notificaciones -->
                    <button class="relative p-2 text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-full">
                        <x-heroicon-o-bell class="h-6 w-6" />
                        <span class="absolute -top-1 -right-1 h-4 w-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                    </button>
                </div>
            </div>
        </header>
        <!-- Slot para el contenido -->
        <div class="p-6">
            @yield('contenido')
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Confirmación para formularios de eliminación
    document.querySelectorAll('form.form-eliminar').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Está seguro?',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2563eb',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'bg-blue-600 text-white rounded-xl px-6 py-2',
                    cancelButton: 'bg-gray-300 text-gray-800 rounded-xl px-6 py-2'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
    // Confirmación para transferir a inventario
    document.querySelectorAll('.btn-confirmar-transferencia').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const url = btn.getAttribute('href');
            Swal.fire({
                title: '¿Transferir productos a inventario?',
                text: 'Esta acción moverá los productos de la factura al inventario general.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#059669',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, transferir',
                cancelButtonText: 'Cancelar',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'bg-emerald-600 text-white rounded-xl px-6 py-2',
                    cancelButton: 'bg-gray-300 text-gray-800 rounded-xl px-6 py-2'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
});
</script>
</body>
</html>

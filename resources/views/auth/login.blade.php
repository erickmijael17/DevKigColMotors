<div class="relative w-full min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('assets/img/loginkig.png') }}');">
    <div class="absolute inset-0 bg-black/60"></div> <!-- Capa oscura -->
    <div class="relative z-10 flex items-center justify-center min-h-screen px-4">
        <div class="flex flex-col gap-6 p-8 rounded-xl shadow-lg bg-white/10 backdrop-blur-md max-w-md w-full">
            <!-- Encabezado -->
            <div class="text-center">
                <h1 class="text-3xl font-extrabold text-red-500 dark:text-yellow-400 uppercase tracking-wide">
                    Bienvenido a KIGCOL
                </h1>
                <p class="text-zinc-200 mt-2">
                    Inicia sesión para acceder a tu panel de repuestos de motocicletas
                </p>
            </div>
            <!-- Session Status -->
            @if (session('status'))
                <div class="text-center text-green-400">{{ session('status') }}</div>
            @endif
            <!-- Formulario -->
            <form wire:submit.prevent="login" class="flex flex-col gap-6 mt-4 text-white">
                <!-- Email -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold text-white">Correo electrónico</label>
                    <input
                        wire:model.defer="email"
                        type="email"
                        required
                        autofocus
                        autocomplete="email"
                        placeholder="ejemplo@kigcol.com"
                        class="form-control bg-white/80 text-black rounded"
                    />
                    @error('email') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>
                <!-- Password -->
                <div class="flex flex-col gap-1 relative">
                    <label class="text-sm font-semibold text-white">Contraseña</label>
                    <input
                        wire:model.defer="password"
                        type="password"
                        required
                        autocomplete="current-password"
                        placeholder="••••••••"
                        class="form-control bg-white/80 text-black rounded"
                    />
                    @error('password') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                    @if (Route::has('password.request'))
                        <a class="absolute end-0 top-0 text-sm mt-2 mr-1 text-yellow-400 hover:underline" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>
                <!-- Remember Me -->
                <div class="flex items-center gap-2">
                    <input type="checkbox" wire:model="remember" id="remember" class="form-check-input" />
                    <label for="remember" class="text-sm text-zinc-200">Recordarme en este dispositivo</label>
                </div>
                <!-- Botón -->
                <div>
                    <button type="submit" class="w-full text-lg font-bold bg-red-600 hover:bg-red-700 rounded py-2">
                        Ingresar a la plataforma
                    </button>
                </div>
            </form>
            <!-- Enlace de registro -->
            @if (Route::has('register'))
                <div class="text-center text-sm text-zinc-200 mt-4">
                    ¿Aún no tienes cuenta?
                    <a href="{{ route('register') }}" class="text-yellow-400 hover:underline">
                        Regístrate aquí
                    </a>
                </div>
            @endif
        </div>
    </div>
</div> 
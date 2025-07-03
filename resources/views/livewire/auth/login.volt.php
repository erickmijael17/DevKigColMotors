<div class="modal-auth-bg" style="background-image: url('{{ asset('assets/img/loginkig.png') }}');">
    <div class="modal-auth-overlay"></div>
    <div class="modal-auth-content">
        <button type="button" class="modal-auth-close" @click.prevent="$dispatch('close-auth-modal')">&times;</button>
        <form wire:submit.prevent="login" class="flex flex-col gap-6 mt-4 text-black">
            <div class="text-center mb-2">
                <h2 class="text-2xl font-bold text-red-600">Iniciar sesión</h2>
                <p class="text-gray-500">Accede a tu cuenta de KIGCOL</p>
            </div>
            <div class="flex flex-col gap-1">
                <label class="text-sm font-semibold">Correo electrónico</label>
                <input wire:model.defer="email" type="email" required autofocus autocomplete="email" placeholder="ejemplo@kigcol.com" class="form-control rounded" />
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col gap-1">
                <label class="text-sm font-semibold">Contraseña</label>
                <input wire:model.defer="password" type="password" required autocomplete="current-password" placeholder="••••••••" class="form-control rounded" />
                @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" wire:model="remember" id="remember" class="form-check-input" />
                <label for="remember" class="text-sm">Recordarme en este dispositivo</label>
            </div>
            <div>
                <button type="submit" class="btn btn-primary w-full text-lg font-bold bg-red-600 hover:bg-red-700 rounded py-2 text-white">
                    Ingresar
                </button>
            </div>
            <div class="text-center text-sm mt-2">
                ¿No tienes cuenta?
                <a href="#" class="text-yellow-500 hover:underline" @click.prevent="$dispatch('close-auth-modal'); $dispatch('open-register-modal')">Regístrate aquí</a>
            </div>
        </form>
    </div>
</div> 
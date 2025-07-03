<div class="modal-auth-bg" style="background-image: url('{{ asset('assets/img/loginkig.png') }}');">
    <div class="modal-auth-overlay"></div>
    <div class="modal-auth-content">
        <button type="button" class="modal-auth-close" @click.prevent="$dispatch('close-register-modal')">&times;</button>
        @php($formulario = \App\Forms\ConstructorFormularios::usuario())
        <form wire:submit.prevent="register" class="flex flex-col gap-6 mt-4 text-black">
            <div class="text-center mb-2">
                <h2 class="text-2xl font-bold text-red-600">Crear cuenta</h2>
                <p class="text-gray-500">Regístrate en KIGCOL</p>
            </div>
            @foreach($formulario->getCampos() as $campo)
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold">{{ $campo->obtenerEtiqueta() }}</label>
                    {!! $campo->renderizar(old($campo->obtenerNombre())) !!}
                    @error($campo->obtenerNombre()) <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            @endforeach
            <div>
                <button type="submit" class="btn btn-primary w-full text-lg font-bold bg-red-600 hover:bg-red-700 rounded py-2 text-white">
                    Crear cuenta
                </button>
            </div>
            <div class="text-center text-sm mt-2">
                ¿Ya tienes cuenta?
                <a href="#" class="text-yellow-500 hover:underline" @click.prevent="$dispatch('close-register-modal'); $dispatch('open-auth-modal')">Inicia sesión aquí</a>
            </div>
        </form>
    </div>
</div> 
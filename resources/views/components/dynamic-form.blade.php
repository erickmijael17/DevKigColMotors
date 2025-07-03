<form action="{{ $action }}" method="{{ $realMethod() }}" {!! $enctype ? 'enctype="' . $enctype . '"' : '' !!} class="bg-white shadow-md rounded-2xl p-8">
    @csrf
    @if($spoofedMethod())
        @method($spoofedMethod())
    @endif

    <div class="mb-6">
        <a href="{{ isset($rutaVolver) ? $rutaVolver : url()->previous() }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold px-4 py-2 rounded-xl transition-all bg-blue-50 hover:bg-blue-100 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Volver
        </a>
    </div>

    <h2 class="text-2xl font-bold text-gray-700 mb-8">{{ $formulario->getTitulo() }}</h2>

    <div class="space-y-6">
    @foreach($formulario->getCampos() as $campo)
        <div class="relative group">
            @switch($campo->getTipo())
                @case('select')
                    <div class="relative">
                        <select
                            id="{{ $campo->getNombre() }}"
                            name="{{ $campo->getNombre() }}"
                            class="input-flotante peer w-full px-3 py-3 border border-gray-300 rounded-xl bg-white/70 backdrop-blur-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none transition-all shadow-sm text-gray-700 font-medium pr-10"
                            {{ $campo->esRequerido() ? 'required' : '' }}>
                            <option value="">Seleccione...</option>
                            @foreach($campo->getOpciones() as $valor => $etiqueta)
                                <option value="{{ $valor }}" {{ old($campo->getNombre(), $campo->getValorPorDefecto()) == $valor ? 'selected' : '' }}>
                                    {{ $etiqueta }}
                                </option>
                            @endforeach
                        </select>
                        <!-- Flecha SVG personalizada -->
                        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <label for="{{ $campo->getNombre() }}" class="label-flotante">{{ $campo->getEtiqueta() }} @if($campo->esRequerido())<span class="text-red-500">*</span>@endif</label>
                    </div>
                    @break
                @case('numero')
                    <input type="number"
                           id="{{ $campo->getNombre() }}"
                           name="{{ $campo->getNombre() }}"
                           value="{{ old($campo->getNombre(), $campo->getValorPorDefecto()) }}"
                           placeholder=" "
                           class="input-flotante peer w-full px-3 py-3 border border-gray-300 rounded-xl bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           {{ $campo->esRequerido() ? 'required' : '' }}
                           step="any">
                    <label for="{{ $campo->getNombre() }}" class="label-flotante">{{ $campo->getEtiqueta() }} @if($campo->esRequerido())<span class="text-red-500">*</span>@endif</label>
                    @break
                @case('textarea')
                    <textarea
                        id="{{ $campo->getNombre() }}"
                        name="{{ $campo->getNombre() }}"
                        placeholder=" "
                        class="input-flotante peer w-full px-3 py-3 border border-gray-300 rounded-xl bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                        rows="4"
                        {{ $campo->esRequerido() ? 'required' : '' }}>{{ old($campo->getNombre(), $campo->getValorPorDefecto()) }}</textarea>
                    <label for="{{ $campo->getNombre() }}" class="label-flotante">{{ $campo->getEtiqueta() }} @if($campo->esRequerido())<span class="text-red-500">*</span>@endif</label>
                    @break
                @case('fecha')
                    <input type="date"
                           id="{{ $campo->getNombre() }}"
                           name="{{ $campo->getNombre() }}"
                           value="{{ old($campo->getNombre(), $campo->getValorPorDefecto()) }}"
                           placeholder=" "
                           class="input-flotante peer w-full px-3 py-3 border border-gray-300 rounded-xl bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        {{ $campo->esRequerido() ? 'required' : '' }}>
                    <label for="{{ $campo->getNombre() }}" class="label-flotante">{{ $campo->getEtiqueta() }} @if($campo->esRequerido())<span class="text-red-500">*</span>@endif</label>
                    @break
                @default
                    <input type="text"
                           id="{{ $campo->getNombre() }}"
                           name="{{ $campo->getNombre() }}"
                           value="{{ old($campo->getNombre(), $campo->getValorPorDefecto()) }}"
                           placeholder=" "
                           class="input-flotante peer w-full px-3 py-3 border border-gray-300 rounded-xl bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        {{ $campo->esRequerido() ? 'required' : '' }}>
                    <label for="{{ $campo->getNombre() }}" class="label-flotante">{{ $campo->getEtiqueta() }} @if($campo->esRequerido())<span class="text-red-500">*</span>@endif</label>
            @endswitch

            @if($campo->getTextoAyuda())
                <p class="mt-1 text-sm text-gray-500">{{ $campo->getTextoAyuda() }}</p>
            @endif

            @error($campo->getNombre())
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    @endforeach
    </div>

    <div class="mt-8 flex items-center justify-end gap-2">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
            {{ $submitText ?? 'Guardar' }}
        </button>
        <a href="{{ url()->previous() }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-6 rounded-xl transition-all">Cancelar</a>
    </div>

    <style>
        .input-flotante:focus ~ .label-flotante,
        .input-flotante:not(:placeholder-shown) ~ .label-flotante,
        select.input-flotante:valid ~ .label-flotante {
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
        select.input-flotante {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(4px);
            cursor: pointer;
            padding-right: 2.5rem;
        }
        select.input-flotante:focus {
            box-shadow: 0 0 0 2px #2563eb33;
            border-color: #2563eb;
        }
        select.input-flotante option {
            color: #334155;
            font-size: 1rem;
            padding: 0.5rem 1rem;
        }
    </style>
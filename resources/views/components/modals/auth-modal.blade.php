<div x-data="{ open: false }" x-show="open" @open-auth-modal.window="open = true" @close-auth-modal.window="open = false" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md relative overflow-hidden">
        <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-red-500">
            <i class="bi bi-x-lg"></i>
        </button>
        <div class="p-6">
            {{ $slot }}
        </div>
    </div>
</div> 
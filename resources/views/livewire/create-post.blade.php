<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        Crear nuevo post
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear Nuevo Post
        </x-slot>
        <x-slot name="content">
            <div class="max-w-lg mx-auto ">
                <div class="flex bg-red-100 justify-center items-center h-10 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div>
                        <span class="font-medium">¡Imagen cargando!</span> Espera a que la imagen se termine de procesar.
                    </div>
                </div>
            </div>
            @if ($image)
                <img class="mb-4" src="{{$image->temporaryUrl()}}">
            @endif
            <div class="mb-4">
                <x-jet-label value="Título del post" />
                <x-jet-input type="text" class="w-full" wire:model="title" />
                <x-jet-input-error for="title" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Contenido del post" />
                <textarea wire:model.defer="content"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-md"
                    rows="6">
                </textarea>
                <x-jet-input-error for="content" />
            </div>
            <div>
                <input type="file" wire:model="image">
                <x-jet-input-error for="image"/>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button class="ml-1 disabled:opacity-25" wire:click="store" wire:loading.attr="disabled" wire:target="store">
                Crear Post
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

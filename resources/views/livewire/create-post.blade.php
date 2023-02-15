<div>
    <x-jet-danger-button wire:click="$set('open', true)"> {{-- Implmentación de componente de jetstream (botón),  wire:click="$set('open', true) -> nos permite cambiar el valor de una propiedad sin tener que crear funciones"> --}}
        Crear nuevo post
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open"> {{-- Implementación de componente de jetstream (modal), sincronización con atributo del componente (wire:model="open") --}}

        <x-slot name="title">
            Crear nuevo post
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Título del post" />
                <x-jet-input type="text" class="w-full" wire:model.defer="title"/> {{-- (wire:model="title")->sincroniza con un atributo desde el componente livewire --}}
            </div>

            <div class="mb-4">
                <x-jet-label value="Contenido del post" />
                <textarea wire:model.defer="content" class="form-control w-full" rows="6"></textarea> {{-- Se implementa la clase form-control de tailwind que ha sido compilado desde el archivo resources/css/form.css --}}
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mr-1" wire:click="$set('open', false)"> {{-- Implementación de método mágico para cerrar el modal (wire:click="$set('open')") --}}
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save"> {{-- Se agrega la acción para registrar el nuevo post ejecutando así el método save() localizado en el componente CreatePost.php --}}
                Crear post
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>

<x-jet-confirmation-modal wire:model='showModalConfirmationDelete'>
    <x-slot name="title">
        Confirmación
    </x-slot>
    <x-slot name="content">
        ¿Estas seguro de eliminar el registro?
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('showModalConfirmationDelete', false)" >
            Cancelar
        </x-jet-secondary-button>
        <x-jet-danger-button class="ml-2" wire:click="destroy()">
            Eliminar
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>
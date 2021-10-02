<!--Complemento al componente de la tabla de Departamentos-->
<div class="flex space-x-1 justify-around">
    <button class="text-blue-500 background-transparent font-bold uppercase px-3 py-1 text-xs outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" wire:click="$emit('editRecord', {{ $id }})">Editar</button>
    <button class="text-red-500 background-transparent font-bold uppercase px-3 py-1 text-xs outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" wire:click="$emit('confirmationDelete',{{ $id }})">Remover</button>
</div>
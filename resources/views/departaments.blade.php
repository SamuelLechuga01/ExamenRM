<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Módulos / Departamentos') }}
        </h2>
    </x-slot>
    
    <livewire:departament.module />  
    
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Módulos / Empresas') }}
        </h2>
    </x-slot>
    
    <livewire:company.module />  
    
</x-app-layout>
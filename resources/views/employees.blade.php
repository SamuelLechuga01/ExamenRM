<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Módulos / Empleados') }}
        </h2>
    </x-slot>
    
    <livewire:employee.module />  
    
</x-app-layout>
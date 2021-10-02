<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-3 sm:col-span-3 md:col-span-1 lg:col-span-1 mb-2 border-solid border-grey-light bg-white rounded border shadow-lg w-full">
                    @if($create)
                    <div class="bg-green-500 px-2 py-3 border-solid border-green-400 border-b rounded-t-lg text-white font-extrabold">
                        Nuevo Departamento
                    </div>
                    @endif
                    @if($edit)
                    <div class="bg-blue-500 px-2 py-3 border-solid border-blue-400 border-b rounded-t-lg text-white font-extrabold">
                        Editar Departamento
                    </div>
                    @endif
                    <div class="p-3">
                        @include('livewire.departament.form')
                        @if($create)
                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-1/3">
                                <button class="shadow bg-green-500 hover:bg-green-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                        type="button" wire:click="store()">
                                    Agregar
                                </button>
                            </div>
                            <div class="md:w-1/3"></div>
                        </div>
                        @endif
                        @if($edit)
                        <div class="md:flex md:items-center">
                            <div class="md:w-1/2 flex">
                                <button class="shadow bg-blue-500 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-10 rounded m-auto"
                                        type="button" wire:click="update()">
                                    Editar
                                </button>
                            </div>
                            <div class="md:w-1/2 flex">
                                <button class="shadow bg-red-500 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-10 rounded m-auto"
                                        type="button" wire:click="default()">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-span-3 sm:col-span-3 md:col-span-2 lg:col-span-2 mb-2 w-full">
                    @include('layouts.errors')
                    <livewire:departament.table 
                        hideable="select"
                        hide="created_at, updated_at"
                        exportable
                    />
                </div>
            </div>
        </div>   
    </div>
    @include('livewire.departament.modals')
</div>

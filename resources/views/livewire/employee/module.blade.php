<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-3 sm:col-span-3 md:col-span-3 lg:col-span-3 mb-2 border-solid border-grey-light bg-white rounded border shadow-lg w-full">
                    @if($create && $user->hasTeamPermission($team, 'create_employee'))
                    <div class="bg-green-500 px-2 py-3 border-solid border-green-400 border-b rounded-t-lg text-white font-extrabold">
                        Nuevo Empleado
                    </div>
                    @endif
                    @if($edit && $user->hasTeamPermission($team, 'create_employee'))
                    <div class="bg-blue-500 px-2 py-3 border-solid border-blue-400 border-b rounded-t-lg text-white font-extrabold">
                        Editar Empleado
                    </div>
                    @endif
                    <div class="p-3">
                        @if($user->hasTeamPermission($team, 'create_employee') || $user->hasTeamPermission($team, 'create_employee'))
                        @include('livewire.employee.form')
                        @endif
                        @if($create && $user->hasTeamPermission($team, 'create_employee'))
                       
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
                        @if($edit && $user->hasTeamPermission($team, 'create_employee'))
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
                <div class="col-span-3 sm:col-span-3 md:col-span-3 lg:col-span-3 mb-2 w-full">
                    @include('layouts.errors')
                    <livewire:employee.table 
                        hideable="select"
                        hide="created_at, updated_at"
                        exportable
                    />
<div class="px-4 py-5 bg-white space-y-6 sm:p-3">
                        <div class="px-3 py-3 bg-gray-100 text-right sm:px-6 rounded-md">
                     
                            <a href="{{ route('generatePdf') }}" target="_blank">
                            <button class="inline-flex justify-center py-2 px-4 border border-gray-500 shadow-sm text-sm font-medium rounded-md text-gray-500 bg-white hover:bg-gray-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Descargar PDF
                            </button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>   
    </div>
    @include('livewire.employee.modals')
</div>

@php
$user = auth()->user(); 

$v = \DB::table('teams')->where('user_id', $user->id)->first();


if(empty($v)){
    $v = \DB::table('team_user')->where('user_id', $user->id)->first();
    $team = App\Models\Team::find($v->team_id);
}else{
    $team = App\Models\Team::find($v->id);
}
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden">
                <div class="flex flex-wrap">
                    @if($user->hasTeamPermission($team, 'index_company'))
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <div class="bg-white shadow-md h-96 mx-3 rounded-3xl flex flex-col justify-around items-center overflow-hidden sm:flex-row sm:h-52 sm:w-3/5 md:w-96">
                            <img
                              class="h-1/2 w-full sm:h-full sm:w-1/2 object-cover"
                              src="{{ asset("img/empresa.jpg") }}"
                              alt="image"
                            />
                            <div class="flex-1 w-full flex flex-col items-baseline justify-around h-1/2 pl-6 sm:h-full sm:items-baseline sm:w-1/2">
                              <div class="flex flex-col justify-start items-baseline">
                                <h1 class="text-lg font-normal mb-0 text-gray-600 font-sans">
                                  Empresas
                                </h1>
                              </div>
                              <p class="text-xs text-gray-500 w-4/5">
                                Listado de empresas registradas
                              </p>
                              <div class="w-full flex justify-between items-center">
                                 <a href="{{ route('Companies') }}">
                                    <button class="bg-gray-700 mr-5 text-white px-3 py-1 rounded-sm shadow-md">
                                      Ir
                                    </button>
                                </a>
                              </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($user->hasTeamPermission($team, 'index_departament'))
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <div class="bg-white shadow-md h-96 mx-3 rounded-3xl flex flex-col justify-around items-center overflow-hidden sm:flex-row sm:h-52 sm:w-3/5 md:w-96">
                            <img
                              class="h-1/2 w-full sm:h-full sm:w-1/2 object-cover"
                              src="{{ asset("img/departamento.jpg") }}"
                              alt="image"
                            />
                            <div class="flex-1 w-full flex flex-col items-baseline justify-around h-1/2 pl-6 sm:h-full sm:items-baseline sm:w-1/2">
                              <div class="flex flex-col justify-start items-baseline">
                                <h1 class="text-lg font-normal mb-0 text-gray-600 font-sans">
                                  Departamentos
                                </h1>
                              </div>
                              <p class="text-xs text-gray-500 w-4/5">
                                Listado de departamentos registrados.
                              </p>
                              <div class="w-full flex justify-between items-center">
                                 <a href="{{ route('Departaments') }}">
                                    <button class="bg-gray-700 mr-5 text-white px-3 py-1 rounded-sm shadow-md">
                                      Ir
                                    </button>
                                </a>
                              </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($user->hasTeamPermission($team, 'index_employee'))
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <div class="bg-white shadow-md h-96 mx-3 rounded-3xl flex flex-col justify-around items-center overflow-hidden sm:flex-row sm:h-52 sm:w-3/5 md:w-96">
                            <img
                              class="h-1/2 w-full sm:h-full sm:w-1/2 object-cover"
                              src="{{ asset("img/empleado.jpg") }}"
                              alt="image"
                            />
                            <div class="flex-1 w-full flex flex-col items-baseline justify-around h-1/2 pl-6 sm:h-full sm:items-baseline sm:w-1/2">
                              <div class="flex flex-col justify-start items-baseline">
                                <h1 class="text-lg font-normal mb-0 text-gray-600 font-sans">
                                  Empleados
                                </h1>
                              </div>
                              <p class="text-xs text-gray-500 w-4/5">
                                Listado de empleados registrados
                              </p>
                              <div class="w-full flex justify-between items-center">
                                 <a href="{{ route('Employees') }}">
                                    <button class="bg-gray-700 mr-5 text-white px-3 py-1 rounded-sm shadow-md">
                                      Ir
                                    </button>
                                </a>
                              </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>




</x-app-layout>

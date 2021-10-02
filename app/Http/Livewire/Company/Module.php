<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;

use App\Models\Company;
use App\Models\Team;

use Exception;
use PDF;
use DB;

class Module extends Component
{
    public $team, $user, $team_id;

    //Variables de estado para el formulario form.
    public $create, $edit;

    //variable del modal de confirmación de eliminación
    public $showModalConfirmationDelete;

    //Variables de form
    public $company_id, $name, $country, $address, $enable;
  
    //Variables para la comunicación con el componente table
    protected $listeners = [
        'confirmationDelete' => 'modalConfirmationDelete',
        'editRecord' => 'edit'
    ];

    //Variables con valores por defecto
    public function mount(){

        $this->user = auth()->user(); 

        $v = DB::table('teams')->where('user_id', $this->user->id)->first();
        if(empty($v)){
            $v = DB::table('team_user')->where('user_id', $this->user->id)->first();
            $this->team = Team::find($v->team_id);
        }else{
            $this->team = Team::find($v->id);
        }

        $this->create = true;
        $this->edit   = false;
        $this->showModalConfirmationDelete = false;

    }

    //rederizamos y enviamos el listado de registro al componente.
    public function render()
    {
        return view('livewire.company.module');
    }

    //reglas de formulario
    protected $rules = [

        'name'    => 'required',
        'country' => 'required',
        'address' => 'required'
    ];

    //traducción de los campos
    protected $validationAttributes = [

        'name'      => 'Empresa',
        'country'   => 'País',
        'address'   => 'Dirección',

    ];

    //función para la insercción de registros
    public function store(){
        $this->validate();
        try{
           Company::create([
                'name'   => $this->name,
                'country'  => $this->country,
                'address' => $this->address,
                'enable' => $this->enable   
            ]);

            $this->default();
            $this->emit('store');

            session()->flash('success_message', 'Se añadio correctamente el registro.');

        }catch(Exception $e){
            session()->flash('error_message', 'Error:'.$e);
        }
    }

    //función para la activación del formulario de edición
    public function edit($id){

        $company = Company::find($id);
        $this->company_id   = $company->id;
        $this->name         = $company->name;
        $this->country      = $company->country;
        $this->address      = $company->address;
        $this->enable       = $company->enable;
        $this->create       = false;
        $this->edit         = true;

    }

    //función para la edición del registro
    public function update(){
        $this->validate();
        
        try{
            $company = Company::find($this->company_id);

            $company->update([
                'name'   => $this->name,
                'country'  => $this->country,
                'address'  => $this->address,
                'enable' => $this->enable
            ]);

            $this->default();
            $this->emit('update');
            
            session()->flash('success_message', 'Se edito correctamente el registro.');
        }catch(Exception $e){
            session()->flash('error_message', 'Error:'.$e);
        }
        
    }

    //función para la activación del modal de confirmación
    public function modalConfirmationDelete($id){

        $this->default();
        $this->company_id = $id;
        $this->showModalConfirmationDelete = true;

    }

    //función para la eliminación del registro
    public function destroy(){
        try{

            Company::destroy($this->company_id);

            $this->company_id = "";
            $this->showModalConfirmationDelete = false;

            $this->emit('destroy');
            session()->flash('success_message', 'Se elimino correctamente el registro.');
        }catch(Exception $e){
             session()->flash('error_message', 'Error:'.$e);
        }
        
    }

    //función para asignar valores por defecto a las variables.
    public function default(){

        $this->company_id   = "";
        $this->name         = "";
        $this->country      = "";
        $this->address      = "";
        $this->enable       = 0;
        $this->create       = true;
        $this->edit         = false;

    }
}

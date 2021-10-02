<?php

namespace App\Http\Livewire\Departament;

use Livewire\Component;

use App\Models\Departament;
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
    public $departament_id, $name, $company_id, $enable;
  
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
    public function render()
    {
        return view('livewire.departament.module',[
            'list_companies' => Company::where('enable', 1)->orderBy('name', 'ASC')->get()
        ]);
    }

    //reglas de formulario
    protected $rules = [

        'name'    => 'required',
        'company_id' => 'required'
    ];

    //traducción de los campos
    protected $validationAttributes = [

        'name'      => 'Departamento',
        'company_id'   => 'Empresa'

    ];

    //función para la insercción de registros
    public function store(){
        $this->validate();
        try{
           Departament::create([
                'name'   => $this->name,
                'company_id'  => $this->company_id,
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

        $departament = Departament::find($id);
        $this->departament_id   = $departament->id;
        $this->name         = $departament->name;
        $this->company_id      = $departament->company_id;
        $this->enable       = $departament->enable;
        $this->create       = false;
        $this->edit         = true;

    }

    //función para la edición del registro
    public function update(){
        $this->validate();
        
        try{
            $departament = Departament::find($this->departament_id);

            $departament->update([
                'name'   => $this->name,
                'company_id'  => $this->company_id,
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
        $this->departament_id = $id;
        $this->showModalConfirmationDelete = true;

    }

    //función para la eliminación del registro
    public function destroy(){
        try{

            Departament::destroy($this->departament_id);

            $this->departament_id = "";
            $this->showModalConfirmationDelete = false;

            $this->emit('destroy');
            session()->flash('success_message', 'Se elimino correctamente el registro.');
        }catch(Exception $e){
             session()->flash('error_message', 'Error:'.$e);
        }
        
    }

    //función para asignar valores por defecto a las variables.
    public function default(){

        $this->departament_id   = "";
        $this->name         = "";
        $this->company_id      = "";
        $this->enable       = 0;
        $this->create       = true;
        $this->edit         = false;

    }
}

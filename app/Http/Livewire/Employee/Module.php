<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\Departament;
use App\Models\Company;
use App\Models\Employee;
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
    public $employee_id, $name, $birthday, $email, $gender, $phone, $mobile, $date, $departament_id, $company_id, $list_departaments;
  
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
        $this->list_departaments = [];

    }

    public function render()
    {
        if(!empty($this->company_id)) {
            $this->list_departaments = Departament::where('company_id', $this->company_id)->where('enable', 1)->get();
        }
        return view('livewire.employee.module', [
            'list_employees' => Employee::get(),
            'list_companies' => Company::where('enable', 1)->get()
        ]);
    }

    //reglas de formulario
    protected $rules = [
        'name'    => 'required',
        'birthday' => 'required|date',
        'email' => 'required|email',
        'phone' => 'numeric|digits:10|unique:employees,phone',
        'mobile' => 'numeric|digits:10|unique:employees,mobile',
        'date' => 'required|date',
        'departament_id' => 'required',
        'company_id' => 'required'
    ];

    //traducción de los campos
    protected $validationAttributes = [
        'name'    => 'Nombre',
        'birthday' => 'Compleaños',
        'email' => 'Correo',
        'phone' => 'Teléfono',
        'mobile' => 'Celular',
        'date' => 'Fecha de ingreso',
        'departament_id' => 'Departamento',
        'company_id' => 'Empresa'

    ];

    //función para la insercción de registros
    public function store(){
        $this->validate();
        try{
           Employee::create([
                'name'    => $this->name,
                'birthday' => $this->birthday,
                'email' => $this->email,
                'phone' => $this->phone,
                'mobile' => $this->mobile,
                'date' => $this->date,
                'departament_id' => $this->departament_id,
                'company_id' => $this->company_id
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

        $employee = Employee::find($id);
        $this->employee_id  = $employee->id;
        $this->name         = $employee->name;
        $this->birthday     = $employee->birthday;
        $this->email        = $employee->email;
        $this->phone        = $employee->phone;
        $this->mobile       = $employee->mobile;
        $this->date         = $employee->date;
        $this->departament_id = $employee->departament_id;
        $this->company_id   = $employee->company_id;
        $this->create       = false;
        $this->edit         = true;

    }

    //función para la edición del registro
    public function update(){
        $this->validate([
            'name'    => 'required',
            'birthday' => 'required|date',
            'email' => 'required|email',
            'phone' => 'numeric|digits:10|unique:employees,phone,'.$this->employee_id,
            'mobile' => 'numeric|digits:10|unique:employees,mobile,'.$this->employee_id,
            'date' => 'required|date',
            'departament_id' => 'required',
            'company_id' => 'required'
        ]);
        
        try{
            $employee = Employee::find($this->employee_id);

            $employee->update([
                'name'    => $this->name,
                'birthday' => $this->birthday,
                'email' => $this->email,
                'phone' => $this->phone,
                'mobile' => $this->mobile,
                'date' => $this->date,
                'departament_id' => $this->departament_id,
                'company_id' => $this->company_id
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
        $this->employee_id = $id;
        $this->showModalConfirmationDelete = true;

    }

    //función para la eliminación del registro
    public function destroy(){
        try{

            Employee::destroy($this->employee_id);

            $this->employee_id = "";
            $this->showModalConfirmationDelete = false;

            $this->emit('destroy');
            session()->flash('success_message', 'Se elimino correctamente el registro.');
        }catch(Exception $e){
             session()->flash('error_message', 'Error:'.$e);
        }
        
    }

    //función para asignar valores por defecto a las variables.
    public function default(){

        $this->employee_id  = "";
        $this->name         = "";
        $this->gender     = "";
        $this->birthday     = "";
        $this->email        = "";
        $this->phone        = "";
        $this->mobile       = "";
        $this->date         = "";
        $this->departament_id = "";
        $this->company_id   = "";
        $this->create       = true;
        $this->edit         = false;

    }

    public function generatePdf(){
        $employees = Employee::get();
        $pdf = PDF::loadView('pdfs.list_employees', ['employees' => $employees])->setPaper('letter', 'Landscape');
        
        return $pdf->stream('lista_empleados.pdf',array('Attachment'=>0));
    }
}

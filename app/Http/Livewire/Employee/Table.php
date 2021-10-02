<?php

namespace App\Http\Livewire\Employee;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use App\Models\Employee;

class Table extends LivewireDatatable
{
    protected $listeners = [
        'store' => 'builder',
        'update' => 'builder',
        'destroy' => 'builder'
    ];

    public function builder()
    {
        return Employee::query();
    }

    public function columns()
    {
        return [
            Column::name('name')->label('Nombre')->searchable(),

            Column::name('company.name')->label('Empresa')->searchable(),

            Column::name('departament.name')->label('Departamento')->searchable(),

            Column::callback(['id'], function ($id) {
                return view('livewire.employee.table', ['id' => $id]);
            })
        ];
    }
}
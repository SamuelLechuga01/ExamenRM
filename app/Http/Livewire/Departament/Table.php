<?php

namespace App\Http\Livewire\Departament;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use App\Models\Departament;

class Table extends LivewireDatatable
{
    protected $listeners = [
        'store' => 'builder',
        'update' => 'builder',
        'destroy' => 'builder'
    ];

    public function builder()
    {
        return Departament::query();
    }

    public function columns()
    {
        return [
            Column::name('name')->label('Departamento')->searchable(),

            Column::name('company.name')->label('Empresa')->searchable(),

            BooleanColumn::name('departaments.enable')->label('Estado')->searchable(),

            DateColumn::name('created_at')->label('Creación'),

            DateColumn::name('updated_at')->label('Edición'),

            Column::callback(['id'], function ($id) {
                return view('livewire.departament.table', ['id' => $id]);
            })
        ];
    }
}
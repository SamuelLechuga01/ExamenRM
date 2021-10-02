<?php

namespace App\Http\Livewire\Company;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;

use App\Models\Company;

class Table extends LivewireDatatable
{

    protected $listeners = [
        'store' => 'builder',
        'update' => 'builder',
        'destroy' => 'builder'
    ];

    public function builder()
    {
         return Company::query();
    }

    public function columns()
    {
        return [
            Column::name('name')->label('Empresa')->searchable(),

            Column::name('country')->label('País')->searchable(),

            Column::name('address')->label('Dirección'),

            BooleanColumn::name('companies.enable')->label('Estado'),

            DateColumn::name('created_at')->label('Creación'),

            DateColumn::name('updated_at')->label('Edición'),

            Column::callback(['id'], function ($id) {
                return view('livewire.company.table', ['id' => $id]);
            })
        ];
    }
}
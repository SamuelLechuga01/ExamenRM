<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";

    protected $fillable = ['name', 'birthday', 'email', 'gender', 'phone', 'mobile', 'date', 'departament_id', 'company_id'];

     public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
     public function departament()
    {
        return $this->belongsTo(departament::class, 'departament_id');
    }
}

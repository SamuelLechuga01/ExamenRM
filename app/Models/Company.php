<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = "companies";

    protected $fillable = ['name', 'country', 'address', 'enable'];

    public function departaments()
    {
        return $this->hasMany(Departament::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}

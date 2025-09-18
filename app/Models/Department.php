<?php

namespace App\Models;

use App\Models\EmployeeDetail;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department_name',
        'department_code',
        'description',
    ];

    public function employees()
    {
        return $this->hasMany(EmployeeDetail::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

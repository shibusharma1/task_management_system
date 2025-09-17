<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = ['designation_name', 'hierarchy_level'];
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo, HasOne};

class Institution extends Model
{
    protected $fillable = ['client_id', 'name', 'address', 'phone', 'email', 'website'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function kpis(): HasMany
    {
        return $this->hasMany(KPI::class);
    }

    public function employeeDetails(): HasMany
    {
        return $this->hasMany(EmployeeDetail::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kpi extends Model
{
       protected $fillable = ['institution_id', 'name', 'weight'];

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    public function performanceReports(): HasMany
    {
        return $this->hasMany(PerformanceReport::class);
    }
}

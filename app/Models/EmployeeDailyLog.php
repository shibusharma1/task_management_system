<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class EmployeeDailyLog extends Model
{
    protected $table = 'employee_daily_logs';

    protected $fillable = [
        'employee_id',
        'title',
        'description',
        'priority_id',
        'status',
        'hours_spent',
        'extra_data',
    ];

    protected $casts = [
        'extra_data' => 'array',
        'hours_spent' => 'float',
    ];

    // Relationships
    public function employee(): BelongsTo
    {
        return $this->belongsTo(EmployeeDetail::class, 'employee_id');
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Priority::class, 'priority_id');
    }

    // On create and on update: keep hours_spent updated as difference between created_at and updated_at
    protected static function booted()
    {
        static::created(function (self $model) {
            // at creation, hours_spent is 0.00 by default
            if (!$model->hours_spent) {
                $model->hours_spent = 0;
                $model->saveQuietly(); // avoid infinite loop
            }
        });

        static::updating(function (self $model) {
            // calculate hours between created_at and now (or updated_at if present)
            $created = $model->getOriginal('created_at') ? Carbon::parse($model->getOriginal('created_at')) : ($model->created_at ?? Carbon::now());
            $updated = Carbon::now();
            $hours = round($updated->diffInSeconds($created) / 3600, 2);
            $model->hours_spent = $hours;
        });
    }

    // Provide a dynamic accessor (in case you prefer computed value)
    public function getComputedHoursAttribute()
    {
        if ($this->created_at && $this->updated_at) {
            return round($this->updated_at->diffInSeconds($this->created_at) / 3600, 2);
        }
        return 0.0;
    }
}

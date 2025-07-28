<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_id', 'type', 'timestamp', 'note'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

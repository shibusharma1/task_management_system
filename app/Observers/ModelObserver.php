<?php

namespace App\Observers;

use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Stevebauman\Location\Facades\Location;

class ModelObserver
{
    /**
     * Handle the "created" event.
     */
    public function created($model): void
    {
        $this->log('created', $model, null, $model->getAttributes());
    }

    /**
     * Handle the "updated" event.
     */
    public function updated($model): void
    {
        $this->log('updated', $model, $model->getOriginal(), $model->getChanges());
    }

    /**
     * Handle the "deleted" event.
     */
    public function deleted($model): void
    {
        $this->log('deleted', $model, $model->getOriginal(), null);
    }

    /**
     * Universal logger for model changes.
     */
    protected function log(string $action, $model, $old = null, $new = null): void
    {
        // 🚫 Prevent infinite recursion for AuditLog itself
        if ($model instanceof AuditLog) {
            return;
        }

        try {
            $user = Auth::user();
            $ip = Request::ip() ?? '127.0.0.1';
            $location = null;

            // Attempt to resolve location, but don’t break if fails
            try {
                if ($ip && class_exists(Location::class)) {
                    $position = Location::get($ip);
                    if ($position) {
                        $location = trim(($position->cityName ?? '') . ', ' . ($position->countryName ?? ''), ', ');
                    }
                }
            } catch (\Throwable $e) {
                $location = null; // fallback silently
            }

            $oldValues = $old ? json_encode($old, JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR) : null;
            $newValues = $new ? json_encode($new, JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR) : null;

            AuditLog::create([
                'user_id'        => auth()->user()->id,
                'action'         => $action,
                'auditable_type' => is_object($model) ? get_class($model) : null,
                'auditable_id'   => data_get($model, 'id'),
                'old_values'     => $oldValues,
                'new_values'     => $newValues,
                'ip_address'     => $ip,
                'location'       => $location,
            ]);
        } catch (\Throwable $e) {
            // Final fallback: do not crash the request
            report($e); // log the error in Laravel log
        }
    }
}

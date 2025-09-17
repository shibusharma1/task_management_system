<?php

namespace App\Providers;

use App\Observers\ModelObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $modelsPath = app_path('Models');
        $modelFiles = File::allFiles($modelsPath);

        foreach ($modelFiles as $file) {
            // Get full namespace of the model class
            $class = 'App\\Models\\' . $file->getBasename('.php');

            // Skip AuditLog model to prevent recursive logging
            if ($class === \App\Models\AuditLog::class) {
                continue;
            }

            // Register observer only if it's a valid Eloquent model
            if (class_exists($class) && is_subclass_of($class, Model::class)) {
                $class::observe(ModelObserver::class);
            }
        }
    }
}

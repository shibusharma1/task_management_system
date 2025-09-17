<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
           $table->id();

            // Relations
            $table->foreignId('task_category_id')->nullable()
                ->constrained('task_categories')
                ->onDelete('set null');

            $table->string('name')->nullable();
            $table->text('description')->nullable();

            // Status codes: 0 = pending, 1 = in progress, 2 = completed
            $table->unsignedTinyInteger('status')->default(0)->comment('0 = pending, 1 = in progress, 2 = completed');

            $table->foreignId('priority_id')->nullable()
                ->constrained('priorities')
                ->onDelete('set null');

            $table->foreignId('assigned_to')->nullable()
                ->constrained('users')
                ->onDelete('set null');

            $table->foreignId('assigned_by')->nullable()
                ->constrained('users')
                ->onDelete('set null');

            // is_requested: 0 = no, 1 = yes
            $table->boolean('is_requested')->default(0)->comment('is_requested: 0 = no, 1 = yes');

            // is_approved: 0 = pending, 1 = accepted, 2 = rejected
            $table->unsignedTinyInteger('is_approved')->default(0)->comment('is_approved: 0 = pending, 1 = accepted, 2 = rejected');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

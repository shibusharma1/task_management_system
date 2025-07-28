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
            $table->text('description');
            $table->foreignId('assignee_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('requester_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('status', 20);
            $table->timestamp('due_date')->nullable();
            $table->timestamps();
            $table->integer('quality_score')->nullable();
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

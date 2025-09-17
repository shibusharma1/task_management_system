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
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // who did it
            $table->string('action'); // create, update, delete
            $table->string('auditable_type'); // model class name
            $table->unsignedBigInteger('auditable_id'); // model id
            $table->json('old_values')->nullable(); // before update
            $table->json('new_values')->nullable(); // after create/update
            $table->string('ip_address')->nullable();
            $table->string('location')->nullable(); // optional, from IP
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};

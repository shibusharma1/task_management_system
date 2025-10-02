<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            // Recipient
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->text('message')->nullable();
            $table->string('type')->nullable();//eg.task_assigned,project_update,system alert etc
            // Polymorphic relation for linking to task, project, comment, etc.
            $table->unsignedBigInteger('related_id')->nullable();
            $table->string('related_type')->nullable();

            // Extra info
            $table->boolean('is_read')->default(false);
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->string('priority')->default('normal'); // low, normal, high
            $table->string('channel')->nullable(); // in-app, email, sms
            $table->json('extra_data')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};

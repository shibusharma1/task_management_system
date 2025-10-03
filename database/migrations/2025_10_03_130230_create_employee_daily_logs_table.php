<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDailyLogsTable extends Migration
{
    public function up()
    {
        Schema::create('employee_daily_logs', function (Blueprint $table) {
            $table->id();

            // employee_id FK -> employee_details.id
            $table->foreignId('employee_id')->constrained('employee_details')->onDelete('cascade');

            $table->string('title')->nullable();
            $table->text('description')->nullable();

            // priority_id is optional; assumes you have priorities table (re-uses your Priority model)
            $table->foreignId('priority_id')->nullable()->constrained('priorities')->nullOnDelete();

            // status: 0 = pending, 1 = in-progress, 2 = completed
            $table->tinyInteger('status')->default(0);

            // hours_spent stored as decimal hours (e.g. 1.25)
            $table->decimal('hours_spent', 12, 2)->default(0);

            $table->json('extra_data')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_daily_logs');
    }
}

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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->string('email')->unique(); // VARCHAR(255) UNIQUE
            $table->string('phone', 10);
            $table->text('address'); 
            $table->string('designation', 100);
            $table->string('supervisor')->nullable();
            $table->string('username')->unique(); // VARCHAR(255) UNIQUE
            $table->string('password');
            $table->enum('role', ['admin', 'employee']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

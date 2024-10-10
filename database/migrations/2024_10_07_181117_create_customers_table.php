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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name'); // VARCHAR(255) NOT NULL
            $table->enum('customer_type', ['Pvt.', 'Govt.']);
            $table->string('state', 100)->nullable();
            $table->string('city', 100)->nullable(); 
            $table->text('address')->nullable();
            $table->string('mobile', 10)->nullable();
            $table->string('email')->unique(); // VARCHAR(255) UNIQUE
            $table->string('pan_no', 10)->unique();
            $table->string('gst_no', 15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

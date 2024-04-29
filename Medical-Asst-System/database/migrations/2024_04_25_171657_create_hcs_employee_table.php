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
        Schema::create('hcs_employee', function (Blueprint $table) {
            $table->increments('emp_id');
            $table->string('emp_name');
            $table->enum('emp_gender', ['M', 'F','O']);
            $table->enum('emp_type', ['A', 'N','T']);
            $table->string('emp_email');
            $table->string('emp_contact_num');
            $table->enum('emp_status', ['Busy', 'Free']);
            $table->float('emp_salary');
            $table->string('emp_loc_lat')->nullable();
            $table->string('emp_loc_long')->nullable();
            $table->string('emp_govt_id');
            $table->string('emp_govt_id_path')->nullable();
            $table->string('emp_photo_path')->nullable();
            $table->string('emp_bio_data_path')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hcs_employee');
    }
};

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
        Schema::create('hcs_employees', function (Blueprint $table) {
            $table->unsignedInteger('org_id');
            $table->foreign('org_id')->references('org_id')->on('hcs_organization')->cascadeOnDelete();
            $table->increments('emp_id');
            $table->string('emp_name');
            $table->string('emp_contact_num');
            $table->enum('emp_status', ['Busy', 'Free']);
            $table->float('salary');
            $table->string('rating');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hcs_employees');
    }
};

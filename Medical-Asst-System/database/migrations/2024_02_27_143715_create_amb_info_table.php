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
        Schema::create('amb_info', function (Blueprint $table) {
            $table->string('amb_no')->primary();
            $table->timestamps();
            $table->string('amb_name',100);
            $table->string('amb_type',20);
            $table->string('amb_status',10);
            $table->float('amb_loc_lat',8,4);
            $table->float('amb_loc_lng',8,4);
            $table->float('amb_rate');
            $table->bigInteger('amb_contact');
            $table->string('amb_drv_email');
            $table->string('amb_driver_name',50);
            $table->string('amb_state',50);
            $table->string('amb_district',50);
            $table->string('amb_town',50);
            $table->integer('amb_loc_pincode');
            $table->string('amb_address',200);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amb_info');
    }
};

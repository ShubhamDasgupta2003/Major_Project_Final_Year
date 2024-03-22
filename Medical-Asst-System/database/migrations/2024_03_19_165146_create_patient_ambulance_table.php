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
        Schema::create('patient_ambulance', function (Blueprint $table) {
            $table->string('invoice_no')->primary();
            $table->string('amb_no');
            $table->string('user_id');
            $table->string('amb_type');
            $table->string('patient_name');
            $table->integer('patient_age');
            $table->enum('patient_gender',['M','F','O']);
            $table->bigInteger('patient_mobile');
            $table->float('patient_booking_lat',8,4);
            $table->float('patient_booking_lng',8,4);
            $table->string('patient_booking_city');
            $table->string('patient_booking_state');
            $table->string('patient_booking_district');
            $table->string('patient_booking_zipcode');
            $table->float('patient_booking_address');
            $table->float('amb_current_lat',8,4);
            $table->float('amb_current_lng',8,4);
            $table->date('booking_date');
            $table->time('booking_time');
            $table->integer('ride_status');
            $table->integer('otp');
            $table->float('total_ride_distance',8,2);
            $table->time('ride_started_at');
            $table->time('ride_finished_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_ambulance');
    }
};

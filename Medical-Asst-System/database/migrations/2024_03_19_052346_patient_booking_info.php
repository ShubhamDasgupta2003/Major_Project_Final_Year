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
        Schema::create('patient_booking_info', function (Blueprint $table) {
            $table->string('pnt_id')->primary();
            $table->string('hos_id');
            $table->string('hos_name',60);
            $table->string('user_id');
            $table->string('pnt_first_name',30);
            $table->string('pnt_last_name',30);
            $table->bigInteger('pnt_contactno');
            $table->integer('pnt_age');
            $table->enum('pnt_gender',["Male","Female"]);
            $table->date('pnt_dob');
            $table->string('pnt_email',60);
            $table->string('pnt_address',100);
            $table->string('pnt_city',50);
            $table->integer('pnt_pincode');
            $table->date('pnt_booking_date');
            $table->integer('pnt_bed_charge');
            $table->string('pnt_booking_status',10);
            // $table->timestamps('pnt_booking_timestamp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

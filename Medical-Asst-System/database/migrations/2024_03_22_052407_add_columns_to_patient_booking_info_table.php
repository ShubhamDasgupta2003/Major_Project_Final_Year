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
        Schema::table('patient_booking_info', function (Blueprint $table) {
            $table->integer('pnt_adhr')->after('pnt_email');
            $table->string('pnt_district',50)->after('pnt_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient_booking_info', function (Blueprint $table) {
            //
        });
    }
};

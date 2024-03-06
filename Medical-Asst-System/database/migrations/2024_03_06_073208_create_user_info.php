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
        Schema::create('user_info', function (Blueprint $table) {
            $table->string('user_id')->primary();
            $table->string('user_first_name',30);
            $table->string('user_last_name',30);
            $table->enum('user_gender',["Male","Female","Others"]);
            $table->date('user_dob');
            $table->string('user_email',60);
            $table->longText('user_password');
            $table->bigInteger('user_contactno');
            $table->string('user_state',30);
            $table->string('user_district',30);
            $table->string('user_city',50);
            $table->integer('pincode');
            $table->string('user_last_login');
            $table->float('user_curr_lat');
            $table->float('user_curr_long');
            $table->float('user_lat_in_use');
            $table->float('user_long_in_use');
            $table->string('user_formatted_address');
            $table->integer('user_email_verified');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_info');
    }
};

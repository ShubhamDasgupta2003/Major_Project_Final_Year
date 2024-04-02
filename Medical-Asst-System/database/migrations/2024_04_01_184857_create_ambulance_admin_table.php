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
        Schema::create('ambulance_admin', function (Blueprint $table) {
            $table->id("user_no");
            $table->string("amb_no");
            $table->string("amb_admin_email");
            $table->bigInteger("amb_admin_mob");
            $table->string("amb_admin_paswd");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ambulance_admin');
    }
};

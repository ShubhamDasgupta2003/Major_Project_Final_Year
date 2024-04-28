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
        Schema::create('hcs_orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('emp_id');
            $table->enum('order_type', ['A', 'N','T']);
            $table->string('name');
            $table->enum('gender', ['M', 'F','O']);
            $table->string('contact_num');
            $table->enum('payment_status', ['Yes', 'No']);
            $table->float('land_mark');
            $table->string('order_loc_lat')->nullable();
            $table->string('order_loc_long')->nullable();
            $table->string('address');
            $table->string('district');
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->enum('order_status', ['Canceled', 'Completed','Pending']);
            $table->string('otp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hcs_orders');
    }
};

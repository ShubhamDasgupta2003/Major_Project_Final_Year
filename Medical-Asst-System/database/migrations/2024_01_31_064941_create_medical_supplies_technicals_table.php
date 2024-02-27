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
        Schema::create('medical_supplies_technicals', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('product_name');
            $table->string('product_keywords');
            $table->decimal('product_rate');
            $table->string('product_image');
            $table->string('product_para');
            $table->string('product_desc');
            $table->string('product_makers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_supplies_technicals');
    }
};

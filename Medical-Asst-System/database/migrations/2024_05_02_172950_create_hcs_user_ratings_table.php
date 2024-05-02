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
        Schema::create('hcs_user_ratings', function (Blueprint $table) {
            $table->increments('rating_id');
            $table->string('user_id');
            $table->string('user_name');
            $table->string('emp_id');
            $table->Integer('rating_value');
            $table->string('rating_comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hcs_user_ratings');
    }
};

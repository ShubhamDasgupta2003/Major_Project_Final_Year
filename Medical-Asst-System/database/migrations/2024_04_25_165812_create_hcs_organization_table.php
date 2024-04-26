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
        Schema::create('hcs_organization', function (Blueprint $table) {
            $table->increments('org_id');
            $table->string('org_name');
            $table->enum('org_type', ['A', 'N','M']);
            $table->string('org_location_lat');
            $table->string('org_location_long');
            $table->string('org_full_address');
            $table->string('org_pin_code');
            $table->string('org_district');
            $table->string('org_state');
            $table->string('org_land_mark');
            $table->string('org_email');
            $table->string('org_contact_num1');
            $table->string('org_contact_num2');
            $table->string('org_contact_num3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hcs_organizationn');
    }
};

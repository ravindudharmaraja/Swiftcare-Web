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
        Schema::create('vehicles', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('brand');
        $table->text('overview');
        $table->integer('price');
        $table->integer('year');
        $table->integer('plate_number');
        $table->string('fuel');
        $table->integer('capacity');
        $table->string('image1');
        $table->string('image2');
        $table->string('image3');
        $table->string('image4');
        $table->integer('seatingcapacity');
        $table->integer('airconditioner');
        $table->integer('powerdoorlocks');
        $table->integer('antilockbrakingsystem');
        $table->integer('brakeassist');
        $table->integer('powersteering');
        $table->integer('driverairbag');
        $table->integer('passengerairbag');
        $table->integer('powerwindows');
        $table->integer('cdplayer');
        $table->integer('centrallocking');
        $table->integer('crashsensor');
        $table->integer('leatherseats');
        $table->string('regdate');
        $table->string('updationdate');

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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_information', function (Blueprint $table) {
            $table->string('truck_number')->nullable();
            $table->string('truck_brand')->nullable();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->string('year')->nullable();
            $table->date('condition')->nullable();
            $table->string('fuel')->nullable();
            $table->string('number')->nullable();
            $table->string('capacity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_information');
    }
}

<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('area_code')->unique()->nullable();
            $table->string('otp')->nullable();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->nullable();
            $table->string('driver_category')->nullable();
            $table->string('workplace')->nullable();
            $table->date('date_of_membership')->nullable();
            $table->string('rate')->nullable();
            $table->string('distance')->nullable();
            $table->unsignedBigInteger('phone')->unique();
            $table->string('work_seniority')->nullable();
            $table->string('photo')->nullable();
            $table->string('awards')->nullable();
            $table->timestamps();
        });
        User::query()->create(
            [
                'full_name'=>'Dilshod Hamrayev',
                'area_code'=>554554,
                'email'=>'bekbek2269',
                'password'=>\Illuminate\Support\Facades\Hash::make(123456),
                'phone'=>'998998152511',
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

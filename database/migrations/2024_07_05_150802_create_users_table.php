<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained();
            $table->foreignId('designation_id')->constrained();
            $table->string('name');
            $table->string('phone_number');
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['name' => 'John Due', 'department_id' => 1 , 'designation_id' => 1 ,'phone_number' => '9809804087'],
            ['name' => 'Tommy Mark', 'department_id' => 2 , 'designation_id' => 2 ,'phone_number' => '9809804089'],
            ['name' => 'David Beckam', 'department_id' => 1 , 'designation_id' => 1 ,'phone_number' => '9809804027'],
            ['name' => 'Carlo Ancelloti', 'department_id' => 2 , 'designation_id' => 2 ,'phone_number' => '9809804088'],

        ]);

    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventjoiningusersTable extends Migration
{
    public function up()
    {
        Schema::create('eventjoiningusers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('block')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

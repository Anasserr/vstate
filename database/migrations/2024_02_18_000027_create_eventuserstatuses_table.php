<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventuserstatusesTable extends Migration
{
    public function up()
    {
        Schema::create('eventuserstatuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->boolean('active')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->datetime('event_date')->nullable();
            $table->string('addresse')->nullable();
            $table->string('location_link')->nullable();
            $table->string('lat')->nullable();
            $table->string('lang')->nullable();
            $table->string('published')->nullable();
            $table->string('status')->nullable();
            $table->boolean('show_first')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

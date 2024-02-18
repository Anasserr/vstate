<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateUnitsTable extends Migration
{
    public function up()
    {
        Schema::create('real_estate_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('status')->nullable();
            $table->string('price')->nullable();
            $table->string('featured')->nullable();
            $table->string('premium')->nullable();
            $table->longText('location_link')->nullable();
            $table->string('lat')->nullable();
            $table->string('lang')->nullable();
            $table->string('number_of_room')->nullable();
            $table->string('number_of_floor')->nullable();
            $table->string('number_of_bath_room')->nullable();
            $table->string('number_of_master_room')->nullable();
            $table->string('notes')->nullable();
            $table->boolean('has_garage')->default(0)->nullable();
            $table->string('number_of_garage')->nullable();
            $table->longText('features')->nullable();
            $table->longText('address')->nullable();
            $table->string('bua')->nullable();
            $table->string('ror')->nullable();
            $table->string('roi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

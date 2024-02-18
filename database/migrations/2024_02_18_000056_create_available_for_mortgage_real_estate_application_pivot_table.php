<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailableForMortgageRealEstateApplicationPivotTable extends Migration
{
    public function up()
    {
        Schema::create('available_for_mortgage_real_estate_application', function (Blueprint $table) {
            $table->unsignedBigInteger('real_estate_application_id');
            $table->foreign('real_estate_application_id', 'real_estate_application_id_fk_9494515')->references('id')->on('real_estate_applications')->onDelete('cascade');
            $table->unsignedBigInteger('available_for_mortgage_id');
            $table->foreign('available_for_mortgage_id', 'available_for_mortgage_id_fk_9494515')->references('id')->on('available_for_mortgages')->onDelete('cascade');
        });
    }
}

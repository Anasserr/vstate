<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenityRealEstateUnitPivotTable extends Migration
{
    public function up()
    {
        Schema::create('amenity_real_estate_unit', function (Blueprint $table) {
            $table->unsignedBigInteger('real_estate_unit_id');
            $table->foreign('real_estate_unit_id', 'real_estate_unit_id_fk_9469718')->references('id')->on('real_estate_units')->onDelete('cascade');
            $table->unsignedBigInteger('amenity_id');
            $table->foreign('amenity_id', 'amenity_id_fk_9469718')->references('id')->on('amenities')->onDelete('cascade');
        });
    }
}

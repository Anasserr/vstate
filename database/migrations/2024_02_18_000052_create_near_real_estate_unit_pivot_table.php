<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNearRealEstateUnitPivotTable extends Migration
{
    public function up()
    {
        Schema::create('near_real_estate_unit', function (Blueprint $table) {
            $table->unsignedBigInteger('real_estate_unit_id');
            $table->foreign('real_estate_unit_id', 'real_estate_unit_id_fk_9469760')->references('id')->on('real_estate_units')->onDelete('cascade');
            $table->unsignedBigInteger('near_id');
            $table->foreign('near_id', 'near_id_fk_9469760')->references('id')->on('nears')->onDelete('cascade');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateTypeRealEstateUnitPivotTable extends Migration
{
    public function up()
    {
        Schema::create('real_estate_type_real_estate_unit', function (Blueprint $table) {
            $table->unsignedBigInteger('real_estate_unit_id');
            $table->foreign('real_estate_unit_id', 'real_estate_unit_id_fk_9496856')->references('id')->on('real_estate_units')->onDelete('cascade');
            $table->unsignedBigInteger('real_estate_type_id');
            $table->foreign('real_estate_type_id', 'real_estate_type_id_fk_9496856')->references('id')->on('real_estate_types')->onDelete('cascade');
        });
    }
}

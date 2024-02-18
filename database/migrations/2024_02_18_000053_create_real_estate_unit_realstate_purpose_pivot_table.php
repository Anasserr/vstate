<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateUnitRealstatePurposePivotTable extends Migration
{
    public function up()
    {
        Schema::create('real_estate_unit_realstate_purpose', function (Blueprint $table) {
            $table->unsignedBigInteger('real_estate_unit_id');
            $table->foreign('real_estate_unit_id', 'real_estate_unit_id_fk_9496854')->references('id')->on('real_estate_units')->onDelete('cascade');
            $table->unsignedBigInteger('realstate_purpose_id');
            $table->foreign('realstate_purpose_id', 'realstate_purpose_id_fk_9496854')->references('id')->on('realstate_purposes')->onDelete('cascade');
        });
    }
}

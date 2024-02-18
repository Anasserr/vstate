<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateApplicationRealEstateTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('real_estate_application_real_estate_type', function (Blueprint $table) {
            $table->unsignedBigInteger('real_estate_application_id');
            $table->foreign('real_estate_application_id', 'real_estate_application_id_fk_9494540')->references('id')->on('real_estate_applications')->onDelete('cascade');
            $table->unsignedBigInteger('real_estate_type_id');
            $table->foreign('real_estate_type_id', 'real_estate_type_id_fk_9494540')->references('id')->on('real_estate_types')->onDelete('cascade');
        });
    }
}

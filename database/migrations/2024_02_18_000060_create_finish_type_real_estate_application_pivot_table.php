<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinishTypeRealEstateApplicationPivotTable extends Migration
{
    public function up()
    {
        Schema::create('finish_type_real_estate_application', function (Blueprint $table) {
            $table->unsignedBigInteger('real_estate_application_id');
            $table->foreign('real_estate_application_id', 'real_estate_application_id_fk_9494543')->references('id')->on('real_estate_applications')->onDelete('cascade');
            $table->unsignedBigInteger('finish_type_id');
            $table->foreign('finish_type_id', 'finish_type_id_fk_9494543')->references('id')->on('finish_types')->onDelete('cascade');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateApplicationViewPivotTable extends Migration
{
    public function up()
    {
        Schema::create('real_estate_application_view', function (Blueprint $table) {
            $table->unsignedBigInteger('real_estate_application_id');
            $table->foreign('real_estate_application_id', 'real_estate_application_id_fk_9494541')->references('id')->on('real_estate_applications')->onDelete('cascade');
            $table->unsignedBigInteger('view_id');
            $table->foreign('view_id', 'view_id_fk_9494541')->references('id')->on('views')->onDelete('cascade');
        });
    }
}

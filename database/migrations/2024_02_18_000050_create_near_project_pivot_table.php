<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNearProjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('near_project', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_9504206')->references('id')->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger('near_id');
            $table->foreign('near_id', 'near_id_fk_9504206')->references('id')->on('nears')->onDelete('cascade');
        });
    }
}

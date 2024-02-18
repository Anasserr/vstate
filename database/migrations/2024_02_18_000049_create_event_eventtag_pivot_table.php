<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventEventtagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('event_eventtag', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id', 'event_id_fk_9441506')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedBigInteger('eventtag_id');
            $table->foreign('eventtag_id', 'eventtag_id_fk_9441506')->references('id')->on('eventtags')->onDelete('cascade');
        });
    }
}

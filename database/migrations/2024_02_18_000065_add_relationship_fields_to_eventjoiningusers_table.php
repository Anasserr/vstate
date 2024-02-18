<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEventjoiningusersTable extends Migration
{
    public function up()
    {
        Schema::table('eventjoiningusers', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('event_id', 'event_fk_9441509')->references('id')->on('events');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_9441510')->references('id')->on('users');
            $table->unsignedBigInteger('event_status_id')->nullable();
            $table->foreign('event_status_id', 'event_status_fk_9441511')->references('id')->on('eventuserstatuses');
        });
    }
}

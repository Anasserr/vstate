<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEventDiscussionsTable extends Migration
{
    public function up()
    {
        Schema::table('event_discussions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_9441540')->references('id')->on('users');
            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('event_id', 'event_fk_9441541')->references('id')->on('events');
            $table->unsignedBigInteger('replay_discussion_id')->nullable();
            $table->foreign('replay_discussion_id', 'replay_discussion_fk_9441547')->references('id')->on('event_discussions');
        });
    }
}

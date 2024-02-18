<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookMeetingsTable extends Migration
{
    public function up()
    {
        Schema::create('book_meetings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('date');
            $table->string('meeting_type')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->longText('message')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

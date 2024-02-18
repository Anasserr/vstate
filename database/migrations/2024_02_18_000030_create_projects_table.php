<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->boolean('active')->default(0)->nullable();
            $table->string('status')->nullable();
            $table->string('lat')->nullable();
            $table->string('lang')->nullable();
            $table->longText('location_link')->nullable();
            $table->longText('description')->nullable();
            $table->string('addresse')->nullable();
            $table->string('featured')->nullable();
            $table->string('plan_title')->nullable();
            $table->string('second_title')->nullable();
            $table->longText('second_description')->nullable();
            $table->string('plan_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

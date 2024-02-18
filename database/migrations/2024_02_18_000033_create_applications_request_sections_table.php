<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsRequestSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('applications_request_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->boolean('active')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

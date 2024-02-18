<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('real_estate_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('addresse')->nullable();
            $table->string('location')->nullable();
            $table->decimal('max_price', 15, 2)->nullable();
            $table->decimal('min_price', 15, 2)->nullable();
            $table->string('deliver_year')->nullable();
            $table->string('number_of_rooms')->nullable();
            $table->string('floor')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_phone')->nullable();
            $table->longText('notes')->nullable();
            $table->string('time_of_call')->nullable();
            $table->string('email')->nullable();
            $table->string('purpose_of_request')->nullable();
            $table->string('min_area')->nullable();
            $table->string('max_area')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

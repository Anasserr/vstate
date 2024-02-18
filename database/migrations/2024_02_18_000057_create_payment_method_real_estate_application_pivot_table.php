<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodRealEstateApplicationPivotTable extends Migration
{
    public function up()
    {
        Schema::create('payment_method_real_estate_application', function (Blueprint $table) {
            $table->unsignedBigInteger('real_estate_application_id');
            $table->foreign('real_estate_application_id', 'real_estate_application_id_fk_9494517')->references('id')->on('real_estate_applications')->onDelete('cascade');
            $table->unsignedBigInteger('payment_method_id');
            $table->foreign('payment_method_id', 'payment_method_id_fk_9494517')->references('id')->on('payment_methods')->onDelete('cascade');
        });
    }
}

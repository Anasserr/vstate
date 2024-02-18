<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodRealEstateUnitPivotTable extends Migration
{
    public function up()
    {
        Schema::create('payment_method_real_estate_unit', function (Blueprint $table) {
            $table->unsignedBigInteger('real_estate_unit_id');
            $table->foreign('real_estate_unit_id', 'real_estate_unit_id_fk_9496855')->references('id')->on('real_estate_units')->onDelete('cascade');
            $table->unsignedBigInteger('payment_method_id');
            $table->foreign('payment_method_id', 'payment_method_id_fk_9496855')->references('id')->on('payment_methods')->onDelete('cascade');
        });
    }
}

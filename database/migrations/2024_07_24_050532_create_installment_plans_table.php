<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentPlansTable extends Migration
{
    public function up()
    {
        Schema::create('installment_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->string('customer_name');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('monthly_deposit', 10, 2);
            $table->decimal('balance', 10, 2);
            $table->integer('period');
            $table->decimal('amount_credited', 10, 2);
            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('installment_plans');
    }
}


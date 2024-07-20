<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->string('color');
            $table->string('model');
            $table->string('status');
            $table->string('customer_name')->nullable();
            $table->string('customer_contact')->nullable();
            $table->decimal('amount_sold', 10, 2)->nullable();
            $table->decimal('amount_paid', 10, 2);
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->decimal('balance', 10, 2)->nullable();
            $table->date('date_bought')->nullable();
            $table->string('period')->nullable();
            $table->decimal('amount_credited', 10, 2)->nullable();
            $table->decimal('monthly_deposit', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}

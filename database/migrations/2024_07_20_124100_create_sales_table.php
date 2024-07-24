<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_name');
            $table->string('customer_name');
            $table->bigInteger('amount_paid');
            $table->string('payment_type');
            $table->bigInteger('balance')->nullable();
            $table->date('sale_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}

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
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->string('customer_name');
            $table->string('customer_contact');
            $table->unsignedBigInteger('amount_paid');
            $table->string('payment_type');
            $table->unsignedBigInteger('balance')->nullable();
            $table->string('chassis_number');
            $table->date('sale_date');
            $table->unsignedBigInteger('total_amount')->nullable();
            $table->string('period')->nullable();
            $table->unsignedBigInteger('amount_credited')->nullable();
            $table->unsignedBigInteger('monthly_deposit')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}

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
            $table->string('number')->unique();
            $table->string('color');
            $table->string('model');
            $table->decimal('amount_paid', 15, 2)->nullable();
            $table->decimal('balance', 15, 2)->nullable();
            $table->date('date_bought');
            $table->string('status')->default('available');
            $table->decimal('amount_credited', 15, 2)->nullable();
            $table->string('period')->nullable();
            $table->string('contact')->nullable();
            $table->decimal('monthly_deposit', 15, 2)->nullable();
            $table->decimal('total_amount', 15, 2)->nullable();
            $table->string('customer_name')->nullable();
            $table->date('sale_date')->nullable();
            $table->string('payment_type')->nullable();
            $table->decimal('blocker_fee', 15, 2)->nullable(); // New column
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}

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
            $table->decimal('amount_paid', 15, 2)->nullable(); // Increased precision and scale
            $table->decimal('balance', 15, 2)->nullable(); // Increased precision and scale
            $table->date('date_bought');
            $table->string('status')->default('available');
            $table->decimal('amount_credited', 15, 2)->nullable(); // Increased precision and scale
            $table->string('period')->nullable(); // Changed to string to store textual data
            $table->string('contact')->nullable(); // Changed to string for contact information
            $table->decimal('monthly_deposit', 15, 2)->nullable(); // Increased precision and scale
            $table->decimal('total_amount', 15, 2)->nullable(); // Increased precision and scale
            $table->string('customer_name')->nullable(); // Allowing null values
            $table->date('sale_date')->nullable(); // Allowing null values
            $table->string('payment_type')->nullable(); // Allowing null values
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}

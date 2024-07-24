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
            $table->unsignedBigInteger('vehicle_id');
            $table->string('customer_name');
            $table->decimal('amount_paid', 10, 2);
            $table->enum('payment_type', ['full', 'installment']);
            $table->decimal('balance', 10, 2)->nullable();
            $table->string('chassis_number');
            $table->date('sale_date');
            $table->string('vehicle_name');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}

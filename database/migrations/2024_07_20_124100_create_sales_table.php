<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
 // database/migrations/xxxx_xx_xx_create_sale_details_table.php
public function up()
{
    Schema::create('sales', function (Blueprint $table) {
        $table->id();
        $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
        $table->string('customer_name');
        $table->decimal('amount_paid', 10, 2);
        $table->string('payment_type');
        $table->decimal('balance', 10, 2)->nullable();
        $table->string('chassis_number');
        $table->date('sale_date');
        $table->timestamps();

    });
}


    public function down()
    {
        Schema::dropIfExists('sales');
    }
}

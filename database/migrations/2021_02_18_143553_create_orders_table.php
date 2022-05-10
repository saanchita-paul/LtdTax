<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->string('payment_method');
            $table->string('transaction_id')->nullable();
            $table->double('discount');
            $table->double('total');
            $table->double('paid')->nullable();
            $table->double('extra_discount')->nullable();
            $table->unsignedBigInteger('shipping_id');
            $table->unsignedBigInteger('billing_id');
            $table->tinyInteger('order_type')->comment('0=Book Order,1=Train Order');
            $table->tinyInteger('status')->default(0)->comment('0=Pending,1=On The Way,2=Processing,3=Complete,4=Cancel,Failed=5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

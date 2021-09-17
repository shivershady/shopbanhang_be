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
            $table->decimal('total');
            $table->integer('payment_id');
            $table->float('sub_total');
            $table->bigInteger('user_id');
            $table->string('sale');
            $table->tinyInteger('status')->default(1); //1=Pending, 2=Processing, 3= Sent, 4=Received, 5= Cancel
            $table->tinyInteger('payment_type');
            $table->dateTime('warranty');
            $table->softDeletes();
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

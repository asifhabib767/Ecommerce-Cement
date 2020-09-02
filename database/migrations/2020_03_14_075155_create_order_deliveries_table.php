<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->boolean('delivery_status')->default(0)->comment('0=>not_delivered, 1=>delivered');
            $table->dateTime('delivery_date')->nullable();

            $table->string('delivery_by_id')->nullable();
            $table->string('delivery_by_name')->nullable();
            $table->string('delivery_by_email')->nullable();
            $table->string('delivery_by_phone_no')->nullable();

            $table->text('delivery_message')->nullable();
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
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
        Schema::dropIfExists('order_deliveries');
    }
}

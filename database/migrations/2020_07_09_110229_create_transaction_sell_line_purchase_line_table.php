<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionSellLinePurchaseLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_sell_line_purchase_line', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sell_line_id')->unsigned()->comment("id from transaction_sell_lines")->nullable();
            $table->unsignedBigInteger('vendor_id')->unsigned()->comment("id from vendors table")->nullable();
            $table->unsignedBigInteger('purchase_line_id')->unsigned()->comment("id from purchase_lines");
            $table->decimal('quantity', 8, 2);
            $table->timestamps();

            $table->foreign('sell_line_id')
                ->references('id')
                ->on('transaction_sell_lines')
                ->onDelete('cascade');

            $table->foreign('vendor_id')
                ->references('id')
                ->on('vendors')
                ->onDelete('cascade');

            $table->foreign('purchase_line_id')
                ->references('id')
                ->on('purchase_lines')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_sell_line_purchase_line');
    }
}

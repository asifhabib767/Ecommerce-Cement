<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('vendor_id');
            $table->integer('quantity');
            $table->integer('quantity_sold');
            $table->integer('quantity_returned');
            $table->decimal('purchase_price', 8, 2);
            $table->decimal('purchase_price_inc_tax', 8, 2)->default(0);
            $table->decimal('item_tax', 8, 2)->comment("Tax for one quantity");
            // $table->integer('tax_id')->unsigned()->nullable();
            $table->integer('mfg_date');
            $table->integer('exp_date');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('transaction_id')
                ->references('id')
                ->on('transactions')
                ->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->foreign('vendor_id')
                ->references('id')
                ->on('vendors')
                ->onDelete('cascade');

            $table->foreign('created_by')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');

            // $table->foreign('tax_id')
            //     ->references('id')
            //     ->on('tax_rates')
            //     ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_lines');
    }
}

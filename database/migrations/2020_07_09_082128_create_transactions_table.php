<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id')->unsigned();
            $table->enum('type', ['purchase', 'sell', 'opening_stock']);
            $table->boolean('status')->default(1)->comment('1=>active, 0=>inactive');
            $table->enum('delivery_status', ['delivered', 'not_delivered']);
            $table->enum('payment_status', ['paid', 'due']);
            $table->string('invoice_no')->nullable();
            $table->string('ref_no')->nullable();
            $table->dateTime('transaction_date');
            $table->decimal('total_before_tax', 8, 2)->default(0)->comment('Total before the purchase/invoice tax, this includeds the indivisual product tax');
            $table->decimal('tax_amount', 8, 2)->default(0);
            $table->unsignedBigInteger('discount_type_id');
            $table->string('discount_amount', 10)->nullable();
            $table->string('shipping_details')->nullable();
            $table->string('order_quantity')->nullable();
            $table->decimal('shipping_charges', 8, 2)->default(0);
            $table->text('additional_notes')->nullable();
            $table->text('staff_note')->nullable();
            $table->decimal('paid_total', 8, 2)->default(0);
            $table->decimal('due_total', 8, 2)->default(0);
            $table->decimal('final_total', 8, 2)->default(0);
            $table->unsignedBigInteger('created_by');
            $table->string('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('vendor_id')
                ->references('id')
                ->on('vendors')
                ->onDelete('cascade');

            $table->foreign('discount_type_id')
                ->references('id')
                ->on('discount_types')
                ->onDelete('cascade');

            // $table->foreign('tax_id')
            //     ->references('id')
            //     ->on('tax_rates')
            //     ->onDelete('cascade');

            $table->foreign('created_by')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');

            //Indexing
            $table->index('vendor_id');
            $table->index('type');
            $table->index('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}

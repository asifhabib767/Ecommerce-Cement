<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('vendor_id');
            $table->decimal('amount', 8, 2)->default(0);
            $table->enum('method', ['cash', 'card', 'cheque', 'bank_transfer', 'other']);

            $table->string('card_transaction_number')->nullable();
            $table->string('card_number')->nullable();
            $table->enum('card_type', ['visa', 'master'])->nullable();
            $table->string('card_holder_name')->nullable();
            $table->string('card_month')->nullable();
            $table->string('card_year')->nullable();
            $table->string('card_security', 5)->nullable();

            $table->string('cheque_number')->nullable();

            $table->string('bank_account_number')->nullable();

            $table->string('note')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('transaction_id')
                ->references('id')
                ->on('transactions')
                ->onDelete('cascade');

            $table->foreign('vendor_id')
                ->references('id')
                ->on('vendors')
                ->onDelete('cascade');


            $table->foreign('created_by')
                ->references('id')
                ->on('admins')
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
        Schema::dropIfExists('transaction_payments');
    }
}

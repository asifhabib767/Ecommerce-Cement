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
            $table->unsignedBigInteger('user_id');
            $table->text('note')->nullable();
            $table->float('final_total')->default(0);
            $table->float('discount_amount')->default(0);
            $table->unsignedBigInteger('discount_type_id')->nullable();
            $table->float('grand_total')->default(0);
            $table->float('paid_total')->default(0);
            $table->float('due_total')->default(0);
            $table->enum('status', ['ordered', 'seen'])->default('ordered');
            $table->enum('payment_status', ['due', 'partially_paid', 'complete'])->default('due');
            $table->enum('delivery_status', ['not_delivered', 'delivered'])->default('not_delivered');
            $table->boolean('from_ecommerce')->default(1)->comment('1=>From Ecommerce, 0=> From POS');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('discount_type_id')
                ->references('id')
                ->on('discount_types')
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
        Schema::dropIfExists('orders');
    }
}

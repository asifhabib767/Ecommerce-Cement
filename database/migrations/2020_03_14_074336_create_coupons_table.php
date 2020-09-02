<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->dateTimeTz('start_date');
            $table->dateTimeTz('end_date');
            $table->boolean('is_active')->default(1);
            $table->boolean('enable_consume_limit')->default(1)->comment('1=>There is a limit consuming the coupon, 0=> No limit');
            $table->unsignedInteger('consume_limit_value')->default(0);
            $table->unsignedInteger('total_consumed')->default(0);

            $table->unsignedBigInteger('discount_type_id');
            $table->unsignedInteger('criteria_min_qty')->nullable();
            $table->unsignedInteger('criteria_min_amount')->nullable();

            $table->enum('discount_value_type', ['percent', 'fixed'])->default('fixed');
            $table->float('discount_amount')->default(0)->nullable();

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
        Schema::dropIfExists('coupons');
    }
}

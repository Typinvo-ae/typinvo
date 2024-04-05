<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


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
            $table->text('unique_order_id')->default(0);
            $table->integer('order_type')->comment('1=>user,2=>company')->default(0);
            $table->text('tax_number')->nullable();
            $table->text('user_name')->nullable();
            $table->integer('user_id')->default(0);
            $table->integer('main_id')->default(0);
            $table->integer('order_main')->default(0);
            $table->integer('order_current_main')->default(0);
            $table->float('total_tax')->default(0);
            $table->float('subtotal')->default(0);
            $table->float('total_discount')->default(0);
            $table->float('total_discount_invisible')->default(0);
            $table->float('total_paid')->nullable();
            $table->float('total_remain')->nullable(0);
            $table->integer('all_paid')->default(0);
            $table->integer('company_id')->default(0);
            $table->text('notes')->nullable();
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

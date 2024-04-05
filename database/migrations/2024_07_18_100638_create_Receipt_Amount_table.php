<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptAmountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_amount', function (Blueprint $table) {
            $table->id();
            $table->text('title')->default(0);
            $table->integer('order_id')->default(0);
            $table->integer('user_id')->default(0);
            $table->float('price')->default(0);
            $table->text('notes')->default(0);
            $table->float('amount_received')->default(0);
            $table->float('amount_remain')->default(0);
            $table->text('reference')->nullable();
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
        Schema::dropIfExists('amount_receipt');
    }
}

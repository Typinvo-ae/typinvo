<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('user_id')->default(0);
            $table->integer('main_id')->default(0);
            $table->integer('payment_type_id')->default(0);
            $table->integer('status')->default(1);
            $table->float('amount')->default(0);
            $table->text('user_name')->nullable();
            $table->text('reference')->nullable();
            $table->text('notes')->nullable();
            $table->text('invoice_type')->nullable();
            $table->string('order_from')->nullable();
            $table->text('side_name')->nullable();
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
        Schema::dropIfExists('Payments');
    }
}

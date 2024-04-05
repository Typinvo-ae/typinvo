<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->default(0);
            $table->integer('user_id')->default(0);
            $table->integer('main_id')->default(0);
            $table->integer('status')->default(0);
            $table->float('amount')->default(0);
            $table->text('user_name')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('company_transactions');
    }
}

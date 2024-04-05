<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Expenses', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->integer('user_id')->default(0);
            $table->text('reference')->nullable();
            $table->text('supply_company')->nullable();
            $table->text('supply_company_phone')->nullable();
            $table->text('notes')->nullable();
            $table->float('amount_without_tax')->default(0);
            $table->float('supply_company_tax')->default(0);
            $table->float('tax')->default(0);
            $table->float('total_amount')->default(0);
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
        Schema::dropIfExists('Expenses');
    }
}

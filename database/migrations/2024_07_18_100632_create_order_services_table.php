<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateOrderServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_services', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->default(0);
            $table->integer('service_id')->default(0);
            $table->float('qty')->default(0);
            $table->float('government_price')->default(0);
            $table->float('printing_price')->default(0);
            $table->float('discount')->default(0);
            $table->float('discount_invisible')->default(0);
            $table->float('tax')->default(0);
            $table->float('total_without_tax')->default(0);
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
        Schema::dropIfExists('order_services');
    }
}

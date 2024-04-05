<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('category_type')->default(0)->comment('1=>card,0=>service');
            $table->integer('main')->default(0);
            $table->text('category_childs')->nullable();
            $table->boolean('is_active')->default(1);
            $table->integer('department_id')->default(0);
            $table->float('government_price')->default(0);
            $table->float('printing_price')->default(0);
            $table->float('total')->default(0);
            $table->integer('visible')->default(1);
            $table->integer('order')->default(1000);
            $table->text('image')->nullable();
            $table->integer('category_id')->default(0);
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
        Schema::dropIfExists('categories');
    }
}

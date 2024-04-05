<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('employee_id')->default(0);
            $table->integer('visible')->default(1);
            $table->text('name')->nullable();
            $table->text('name_ar')->nullable();
            $table->text('identifier_key')->unique()->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->float('max_debt')->default(0);
            $table->float('cash_account')->nullable();
            $table->string('delegate_phone')->nullable();
            $table->string('delegate_name')->nullable();
            $table->float('printing_fees')->default(0);
            $table->string('tax_number')->nullable();
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
        Schema::dropIfExists('companies');
    }
}

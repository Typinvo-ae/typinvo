<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();;
            $table->text('image')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password');
        

            $table->string('company_name')->nullable();;
            $table->text('company_image')->nullable();
            $table->string('company_phone')->unique()->nullable();
            $table->string('company_email')->unique()->nullable();
            $table->text('company_title')->nullable();
            $table->text('company_tax_number')->nullable();

            $table->text('remember_token')->nullable();
            $table->integer('membership_id')->default(1);
            $table->integer('owner_id')->default(0);
            $table->integer('employee_id')->default(0);
            $table->integer('account_type')->default(0);
            $table->boolean('is_active')->default(1);
            $table->unsignedInteger('color')->default(0);
            $table->timestamps();
            $table->string('role')->default('isAdmin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

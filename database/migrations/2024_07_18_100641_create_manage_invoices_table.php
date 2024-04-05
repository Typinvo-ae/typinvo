<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManageInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('manage_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('company_title')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_tax_number')->nullable();
            $table->string('client_title')->nullable();
            $table->string('client_company_name')->nullable();
            $table->string('company_identifier')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('delegate_phone')->nullable();
            $table->string('delegate_email')->nullable();
            $table->string('delegate_tax_number')->nullable();
            $table->string('services_title')->nullable();
            $table->string('service_title')->nullable();
            $table->string('service_unit')->nullable();
            $table->string('service_count')->nullable();
            $table->string('printing_fees')->nullable();
            $table->string('government_fees')->nullable();
            $table->string('discount')->nullable();
            $table->string('total_price')->nullable();
            $table->string('all_total_price')->nullable();
            $table->string('total_discount')->nullable();
            $table->string('dirham')->nullable();
            $table->string('tax')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('total_paid')->nullable();
            $table->string('notice')->nullable();
            $table->string('total_printing_fees')->nullable();
            $table->string('remaining_debt_amount')->nullable();
            $table->string('total_government_fees')->nullable();


            $table->string('company_title_en')->nullable();
            $table->string('company_name_en')->nullable();
            $table->string('company_phone_en')->nullable();
            $table->string('company_email_en')->nullable();
            $table->string('company_tax_number_en')->nullable();
            $table->string('client_title_en')->nullable();
            $table->string('client_company_name_en')->nullable();
            $table->string('company_identifier_en')->nullable();
            $table->string('client_phone_en')->nullable();
            $table->string('delegate_phone_en')->nullable();
            $table->string('delegate_email_en')->nullable();
            $table->string('delegate_tax_number_en')->nullable();
            $table->string('services_title_en')->nullable();
            $table->string('service_title_en')->nullable();
            $table->string('service_unit_en')->nullable();
            $table->string('service_count_en')->nullable();
            $table->string('printing_fees_en')->nullable();
            $table->string('government_fees_en')->nullable();
            $table->string('discount_en')->nullable();
            $table->string('total_price_en')->nullable();
            $table->string('all_total_price_en')->nullable();
            $table->string('total_discount_en')->nullable();
            $table->string('dirham_en')->nullable();
            $table->string('tax_en')->nullable();
            $table->string('unit_price_en')->nullable();
            $table->string('total_paid_en')->nullable();
            $table->string('notice_en')->nullable();
            $table->string('total_printing_fees_en')->nullable();
            $table->string('remaining_debt_amount_en')->nullable();
            $table->string('total_government_fees_en')->nullable();


            $table->integer('user_id')->default(0);
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
        Schema::dropIfExists('manage_invoices');
    }
}

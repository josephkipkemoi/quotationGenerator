<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_totals', function (Blueprint $table) {
            $table->id();
            $table->string('quotation_id')->references('company_id')->on('company_details');

            $table->integer('quotation_sub_total');
            $table->integer('quotation_vat');
            $table->integer('quotation_total');

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
        Schema::dropIfExists('quotation_totals');
    }
}

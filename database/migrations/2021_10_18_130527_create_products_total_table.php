<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTotalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_total', function (Blueprint $table) {
            $table->id();
            $table->string('products_total_id')->references('quotation_id')->on('quotation_details');

            $table->integer('quotation_sub_total');
            $table->integer('quoation_vat');
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
        Schema::dropIfExists('products_total');
    }
}

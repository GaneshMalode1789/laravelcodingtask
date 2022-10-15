<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_options', function (Blueprint $table) {
            $table->increments('option_id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->string("option_name");
            $table->double('option_price', 8, 2);
            $table->timestamps();
            $table->index(['product_id']);
        });
        // option_id, product_id, option_name, option_price
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_options');
    }
}

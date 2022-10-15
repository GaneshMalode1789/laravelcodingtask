<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('cat_id')->on('category');
            $table->integer('sub_cat_id')->unsigned();
            $table->foreign('sub_cat_id')->references('sub_cat_id')->on('sub_category');
            $table->string("product_name");
            $table->text("product_description")->nullable();
            $table->string("product_code");
            $table->string("product_url");
            $table->boolean("product_status")->default(1)->comment('1 for Active, 0 for Inactive');
            $table->timestamps();
            $table->index(['cat_id', 'sub_cat_id']);
        });
        // product_id, cat_id, sub_cat_id, product_name, product_description, product_code, product_url, product_status
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

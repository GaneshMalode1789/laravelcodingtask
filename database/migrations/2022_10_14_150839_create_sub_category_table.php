<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_category', function (Blueprint $table) {
            $table->increments('sub_cat_id');
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('cat_id')->on('category');
            $table->string("sub_cat_name");
            $table->text("sub_cat_description")->nullable();
            $table->string("sub_cat_image");
        });
        // sub_cat_id,cat_id, sub_cat_name, sub_cat_description, sub_cat_image
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_category');
    }
}

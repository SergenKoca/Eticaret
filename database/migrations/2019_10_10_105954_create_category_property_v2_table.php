<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPropertyV2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_property_v2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('main_category_id');
            $table->integer('sub_category_1_id');
            $table->integer('sub_category_2_id');
            $table->integer('main_property_id');
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
        Schema::dropIfExists('category_property_v2');
    }
}

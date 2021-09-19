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
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('category_id');
            $table->integer('quantity');
            $table->float('price');
            $table->bigInteger('discount_id');
//            $table->bigInteger('author_id');
            $table->tinyInteger('active');
            $table->string('iHot');
            $table->string('iPay');
            $table->string('warranty');
            $table->string('view');
            $table->longText('description');
            $table->text('description_seo');
            $table->string('keyword_seo');
            $table->string('title_seo');
            $table->longText('content');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}

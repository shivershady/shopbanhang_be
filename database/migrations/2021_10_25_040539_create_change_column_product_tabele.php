<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeColumnProductTabele extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('products',function (Blueprint $table){
          $table->dropColumn('description_seo');
          $table->dropColumn('title_seo');
          $table->dropColumn('keyword_seo');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products',function (Blueprint $table){
           $table->text('description_seo');
           $table->string('title_seo');
           $table->string('keyword_seo');
        });
    }
}

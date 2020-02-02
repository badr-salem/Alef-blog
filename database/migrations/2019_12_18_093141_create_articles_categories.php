<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_categories', function (Blueprint $table) {
          $table->unsignedBigInteger('article_id');
          $table->unsignedBigInteger('category_id');

          $table->foreign('article_id')
          ->references('id')
          ->on('articles')
          ->onDelete('cascade');

          $table->foreign('category_id')
          ->references('id')
          ->on('categories')
          ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles_categories');
    }
}

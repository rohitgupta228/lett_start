<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('productId');
            $table->string('name');
            $table->string('oneLinerDesc');
            $table->string('detailLink');
            $table->string('price');
            $table->string('mainCat');
            $table->string('catLink');
            $table->string('demolink');
            $table->string('docLink');
            $table->string('screenshot');
            $table->json('category');
            $table->json('added');
            $table->string('screenshotDir');
            $table->string('liveDemoBaseStr');
            $table->longText('overviewHTML');
            $table->json('highlight1');
            $table->json('highlight2');
            $table->json('techUsed');
            $table->json('themeFacts');
            $table->json('screenshots');
            $table->json('initialLog');
            $table->json('changeLog');
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

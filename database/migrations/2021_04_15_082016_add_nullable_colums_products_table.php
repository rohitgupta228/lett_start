<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableColumsProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('internalLink')->nullable()->change();
            $table->string('externalLink')->nullable()->change();
            $table->string('gumroadLink')->nullable()->change();
            $table->string('demolink')->nullable()->change();
            $table->string('docLink')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('internalLink')->nullable(false)->change();
            $table->string('externalLink')->nullable(false)->change();
            $table->string('gumroadLink')->nullable(false)->change();
            $table->string('demolink')->nullable(false)->change();
            $table->string('docLink')->nullable(false)->change();
        });
    }

}

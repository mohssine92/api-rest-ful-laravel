<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_product', function (Blueprint $table) {

            $table->integer('category_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('product_id')->references('id')->on('products');


        });
        /* sin embargo al tratarse a una tabla pivote no es necesario ni siquiera tener un id  ni los tiemstamps puesto que no vamos a estar obteniendo recursos o instancias directamente a la tabla sino sera utulizada de manera transparente
        para nosotros atraves de laravel */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_product');
    }
}

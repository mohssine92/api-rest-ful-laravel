<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;

   /* ==> Recordemos que el orden en que se establezcan las migraciones es muy importante , puesto que laravel les va a ejecutar de manera secuencial , es decir para hacer migracion de producto tiene que existira la migraciond de user
    porque producto hace referencia a user  */
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
            $table->string('name');
            $table->string('description', 1000);
            $table->integer('quantity')->unsigned(); /* tiene que ser entero . y positivo es decir no tener sigono unsigned() */
            $table->string('status')->default(Product::PRODUCTO_NO_DISPONIBLE);  /* => la default funccion asigna valor por defecto que le pasamos por params , al attributo  */
            $table->string('image');
            $table->integer('seller_id')->unsigned();  /* esta es una clave forranea es decir product pertenece a seller */
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('users');
            /* la clave forreanea referenciando a id ususario , por eso hemos dico es muy importante el orden al momento de crear las migraciones sino da fallo al momneto de ejecutar , estamos relacionando directamente con
            user no seller no buyer puesto que lo herede de user
             */




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

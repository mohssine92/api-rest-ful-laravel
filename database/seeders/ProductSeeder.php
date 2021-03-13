<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate(); /* lo que hace truncar es decir  borra registro de la tabla No borra tabla , referimos limpiar antes de insertar de migrar datos  */



       /* => utulizar Model Product luego llamar al metodo estatico factory() al que tenemos acceso gracias al nuevo trait llamado HasFactory - entonces atraves del factory podemos llamar metodo create */
       /* => como params en metodo factory() pasamos numero de instancias deseamos crear , en este caso deseo rellenar con 1000 producto , este proceso podemos hacer de varias maneras
       por varias funcciones existenetes en el framwork por versiones , esta es la manera enseñada en la ultima version   */
       /* en el caso de pruductos tenemos que asociarlo a las categorias al que este producto pertenezca  - con uso del metodo each() vamos a decir por cada instancia  del modelo Product vamos a decir que se ejecute lo siguiente */

        Product::factory(1000)->create()->each(

          function ($producto) { /* esta function recebira cada uno de los productos uno por uno , adicionalmente le inviaremos la cantidad de categorias - lo que queremos generar tal asociacion entre categoria y producto , para generar asociasion
              entre elementos que  tienen relacion de mucho a mucho se utuliza entonces el metodo attach() de laravel por supuesto que recibe un array con la lista de todos ids en este caso categorias que le vamos a agregar a ese producto  */

            $categorias = Category::all()->random(mt_rand(1, 5))->pluck('id');  /* la lista categorias la generamos en orden aleatorio , es decir un producto puede tener 1 o 5 categorias  */
                                                                                /* justo antes he generado 30 instancia del modelo categorias es decir tengo disponible 30 categorias */
                                                                                /* con uso de pluck() le indicamos el atributo que necesitamos en especifico de esta colleccion de registros devuelta de la base de datos  */

            $producto->categories()->attach($categorias);   /* => una vez obtener ids de categorias entro 1 y 5 aleatoriamente le agregamos a esta instancia de este producto que estamos tratando  */

		  }


        );







    }
}


<?php

/* ==>Una vez definidos todos los factories, pues ya tenemos que hacer uso de ellos para insertar infs en el interior de base de datos,esto se hace directamente en un archivo llamado databaseSeeder , es este , por tema de modolorizacion vamos a crear archivos seeders
    separados es clases separadas y con el uso de metodo call() de la clase Seeders la cual heredemos , van a ser conocidos en esta clase , al momento de jecutar el comando php artisan db:seed  */

/* =>cuando ejecuto php artisan db:seed => el unico archivo que se va leer el DatabaseSeeder.php ,es este archivo , Nosotro vamos a separa nuestro codigo en unos archivos llamados modelsleSeeders para cada model
      asi que nuestro codigo seeder sera en cada archivo seeder independiente relacionado en el model correspondiente - */
/* => asi como esta clase la que sea ejecutada con el comando  , lo que tenemos que hacer que esta clase entienda el contenido de la clase o clases seeders relacionados con modelos para terminar el procedsimiento de nuestras
        migraciones . */
 /* php artisan migrate:fresh --seed , cunado termina de ejecutar fressh pasa a ejecutar php artisan de:seed , tambin se puede ejecutar cada uno solo - esto nos serviria si clonamos repositorio de alguinen y todavia no hemos ejecutado ninguna migracion lo migramos ... */

    /* Proceso =>
    1. generar mis clases seeders relacionada con modelos que decido rellenar con datos   php artisan make:seeder UserSeeder  asi por lo demas calses Seeder
    2 .antes de empezar a llamar nuestros factories es importante realizar un borrado de todo que pueda existir en base de datos como tal y esteblecer las claves Foreaneas desactivas atraves un metodo de la facede DB
    3. ahora si hemos hechos estos pasos podemos comenzar en la ejecuccion de los factories

      php artisan db:seed   , sin olvidar de ejecutar antes php artisan migration => para generacion de tablas despues de especificar las shema de cada tabla relacionada con modole que corresponda a nuestra api
      --> en caso actualizamos clases de migraciones con modificaciones por supuesto modificamos tambien los seeder para la insersacion de datos falsos . la ejecuccioo de borrar tablas crear y insertar datos falso se puede hacer con 1 unico
      comando : php artisan migrate:refresh --seed

    */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;




class DatabaseSeeder extends Seeder  /* como esta classe  DatabaseSeeder extiende de esta clase  Seeder puedo utulizara todos los metodos de la clase Seeder   */
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* Orden de ejecuccion en este proyecto ==> User - category - Product - Transaction - category_product */

        /* => Importante puesto que vamos a realizar eliminaciones de manera desordinada refiero truncate() en cada uno de los modelos , No podemos caer en el problema de la sisconsistencia por las claves Foreaneas , asi  lo que vamos hacer
            es desectivar temporalmente la verificacion de dichas claves forreaneas .
            es decir ejecutar una sentencia sql , diciendo deseamos establecer las verificaciones de las claves foreaneas en zero , es decir desactivado*/
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');



        /* de esta manera  al ejecutar esta clase ejecuto todas estas clases voy declarando en seguida , gracias al modolorizacion ..  */
           $this->call(UserSeeder::class);      /* => con esto ya puedo usar todo codigo dentro la funccion run  */
           $this->call(CategorySeeder::class);
           $this->call(ProductSeeder::class);
           $this->call(TransactionSeeder::class);
           $this->call(CategoryProductSeeder::class);




    }

}

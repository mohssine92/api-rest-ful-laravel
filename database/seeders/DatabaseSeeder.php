<?php




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

        /* evitar caller en el problema de claves Foreaneas al momento de borra  */
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');



           /* el orden logico mas importante - hay seeders necesitan dependencia de prop de otros modelos : otros seeders */
           $this->call(UserSeeder::class);
           $this->call(CategorySeeder::class);
           $this->call(ProductSeeder::class);
           $this->call(TransactionSeeder::class);
           $this->call(CategoryProductSeeder::class);




    }

}

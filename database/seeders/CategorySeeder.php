<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;



class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /* lo que hace truncar es decir  borra registro de la tabla No borra tabla , referimos limpiar antes de insertar de migrar datos  */
        Category::truncate();
        Category::factory(30)->create();
    }
}

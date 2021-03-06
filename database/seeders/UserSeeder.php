<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;       /* no se puede aplicar use antes de namespace */

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* lo que hace truncar es decir  borra registro de la tabla No borra tabla , referimos limpiar antes de insertar de migrar datos  */
        User::truncate();
        User::factory(1000)->create();

    }
}

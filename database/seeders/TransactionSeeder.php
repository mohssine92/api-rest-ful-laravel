<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;


class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::truncate();                   /* lo que hace truncar es decir  borra registro de la tabla No borra tabla , referimos limpiar antes de insertar de migrar datos  */
        Transaction::factory(1000)->create();     /* mas detaller ver ProductFactory.php */

    }
}

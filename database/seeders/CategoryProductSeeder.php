<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /* =>para tabla pivote puesto que no tenemos un modelo directo , hacemos acceso a este por medio de la TABLA  utulizando la facede de DB , */
         DB::table('category_product')->truncate();
    }
}

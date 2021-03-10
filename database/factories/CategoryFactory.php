<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/* ==> sintaxis para generar factory indicandole cual es el modelo que se encarga => php artisan make:factory CategoryFactory --model=Category   */

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             /* los ids son autoincremental no necesitamos especificar en el factory puesto ya la table de  db se encarga de asignar de manera secuencial , el id de cada fila insertada por medios de estos factories    */
            'name' => $this->faker->word, /* palabra en vez nombre de persona  */
            'description' => $this->faker->paragraph(1), /* solo requerimos un parrafo */

        ];
    }
}

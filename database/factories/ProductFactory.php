<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->word,
            'description' => $this->faker->paragraph(1),
            'quantity' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement([Product::PRODUCT_DISPONIBLE, Product::PRODUCTO_NO_DISPONIBLE]), /* seran dos valores aleaotrios entre valores constantes que trae el producto  */
            'image' => $this->faker->randomElement(['1.jpg', '2.jpg', '3.jpg']),
            // 'seller_id' => User::inRandomOrder()->first()->id,
            'seller_id' => User::all()->random()->id, /* aqui tenemos que ser cuidadosos , el seller_id tiene que ser un id de un seller que ya exista en nuestra base de datos puesto que el producto generado pertenece a algun seller  */
        ];
    }
}

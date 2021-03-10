<?php

namespace Database\Factories;

use App\models\User;
use App\models\Seller;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* antes de retornar cualquier valor obtemos primero lista de todo compradores y obtener uno de manera aleatoria  */

        $vendedor = Seller::has('products')->get()->random(); /* obtener todo usuario que tienen por lo meno un producto es decir vendedor ->random obtiene solo uno de los vendedores de manera aleatoria  en params podemos especificar Numeros
         de vendedores en random como params  */
	    $comprador = User::all()->except($vendedor->id)->random(); /* cualquiera user puede ser comprador menos el usuario a quien pertenece el producto  sera considerado vendedor segun la ejecuccion en su tiempo real */

        return [

            'quantity' => $this->faker->numberBetween(1, 3),
            'buyer_id' => $this->comprador->id,  /* podra ser el id de un usario cualquiera */
            'product_id' => $this->vendedor->products->random()->id, /* tendria que ser un producto vendido por un usuario diferente al comprador , puesto un comprador no puede comprar sus propios productos porsupuesto  */
            /* asi que basicamente tendriamos que asegurrnos que este id de producto sea el id del producto vendido por un usuario que sea diferente al comprador  */ /* asi no podemos crear prod de manera aleaoria no tendremos la acertas de que ... */

        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'verified' => $verificado = $this->faker->randomElement([User::USUARIO_VERIFICADO, User::USUARIO_NO_VERIFICADO]),  /* variar unicamente de manera aleatoria entre los valores de las constantes que ya definimos */
            'verification_token' => $verificado == User::USUARIO_VERIFICADO ? null : User::generarVerificationToken(), /* condicion , si es verificadi = 1 returnamos null , sino tomamos valor que retorna la function  */
            'admin' => $this->faker->randomElement([User::USUARIO_ADMINISTRADOR, User::USUARIO_REGULAR]), /* gracias a la libreria faker nos proporciona herramienta de : variar unicamente de manera aleatoria entre los valores de las constantes que ya definimos   */
        ];
    }
    /* laravel por defecto incluye un pequeño factory para Modelo User , sin embargo vamos a hacer modificacion para adaptarlo a los atrributos de nuestro modelo , En modo de prueba => los factories se van a encargar de llenar nuestra
       base de datos con fake data , lo unico que tenemos que indicarle typo de tados a rellenar y la cantidad de registros con la que quiero que se rellene la base de datos    */



    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Transaction;
use App\Models\User;


/*
 * al extender de user enmediatamente herede su estructura , por lo tanto no requiere tablas o migraciones especificamnete dedicadas a el simplemente haran uso de tabla creada para user .
 *  no necesita attributes de manera especifica puesto que lo esta extiendo los de manera dirtecta del modelo user por medio de la herencia
*/
class Buyer extends User // => herede su estructura db : atrributes de su modelo asi -  puesto que .. no necesito importar definicion de model
{
    use HasFactory;


    /* Relacion entro los modelos 38
     *  relacion de uno a mucho : es decir un comprador es capaz de comprar muchas veces : es capas de hacer muchas transacciones .
    */
     public function transactions()
     {
        return $this->hasMany(Transaction::class);
     }

}

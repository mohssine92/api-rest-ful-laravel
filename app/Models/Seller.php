<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


/* => recordar que Seller y Buyer ya No extenderian de model , segun el deseño de nuestra api , sino se extenderian de user directamente    */
/* puesto se extendirian de user ya no nesitan importar la definicion de model   */
/* ahora bien , a la hora de crear migraciones es muy imporatnante el orden  */


class Seller extends User
{
    use HasFactory;

    /* buyer y seller no necisitan atrributos de manera especifica puesto que los estan extendiendo directamente del modelo user por medio de la herenncia  */

}

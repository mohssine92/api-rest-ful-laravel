<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Product;
use App\Models\User;




/* => recordar que Seller y Buyer ya No extenderian de model , segun el deseño de nuestra api , sino se extenderian de user directamente    */
/* puesto se extendirian de user ya no nesitan importar la definicion de model   */
/* ahora bien , a la hora de crear migraciones es muy imporatnante el orden  */


class Seller extends User
{
    use HasFactory;

    /* buyer y seller no necisitan atrributos de manera especifica puesto que los estan extendiendo directamente del modelo user por medio de la herenncia  */

    public function products()
    {
    	return $this->hasMany(Product::class);  /* como sabemos , un vendedor pose de muchos Products , asi obtenemos todos products que pose un seller  */ /* es decir product pertenece a seller asi product quien lleva la clave foranea */
    }

}

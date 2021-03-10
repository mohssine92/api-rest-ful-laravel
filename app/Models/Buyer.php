<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Transaction;
use App\Models\User;


/* => recordar que Seller y Buyer ya No extenderian de model , segun el deseño de nuestra api , sino se extenderian de user directamente    */
/* puesto se extendirian de user ya no nesitan importar la definicion de model   */
/* ahora bien , a la hora de crear migraciones es muy imporatnante el orden  */
/* el nombre en plural de la clase se utilizará como nombre de la tabla  */
class Buyer extends User    /* Eloquent Model documentation Laravel */
{
    use HasFactory;

     /* buyer y seller no necisitan atrributos de manera especifica puesto que los estan extendiendo directamente del modelo user por medio de la herenncia  */

     /* vamos implementar la relacion entre cada uno de estos modelos , sabemos al momento de relacionar ,  la relacion seran respetando el orden basandonos en el diseño de original de nuestra apiRestFul   */

     /* un buyer tiene muchas transacciones , => Es decir un comprador compra muchas veces */
     /* cada vez referimos a las transacciones de un comprador en  especifico  los hacemos mediante un attributo o o la funccion segun sea el caso llamada transaction  */

     public function transactions()  /* es un método "relaciones" en las entidades. */
     {
         return $this->hasMany(Transaction::class);
          /* => this Buyer has set (conjunto) transactions relacion de uno a mucho */ /* con ::class => estamos accediendo a la clase  */ /* id_buyer sera presente varias veces en tabla Transaccion porque ha comprado varias veces*/
     }

}

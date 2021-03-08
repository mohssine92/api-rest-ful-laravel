<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const PRODUCT_DISPONIBLE = 'disponible';       /* dicho valor de estos constantes puede ser strings numeros , pues cualquier valor podemos atraves de el controlador estos cosntantes */
    const PRODUCT_NO_DISPONIBLE = 'no disponible';


    protected $fillable = [   /* => implementamos el atrributo fillable */
       'name',
       'description',
       'quantity',
       'status',
       'image',
       'seller_id'

    ];   /* status , vamos a permitir solo dos posible parametros , disponible y no disponible  , lo hacemos atraves del constante */


    /* en el proyecto es seguro requerir si un proyecto esta disponible o no por ello usamos esta funccion , es sencillo  llamamos directamente a esta funccion en lugar de poner condiciones en cada lugar de los lugares para saber si un proyecto esta
    disponible o no   */
    public function estaDiponible()
    {
       return $this->status == Product::PRODUCT_DISPONIBLE;
    }












}

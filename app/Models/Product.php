<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* => Importacion la definicion de los modelos  */
use App\Seller;
use App\Category;
use App\Transaction;

class Product extends Model {
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

    public function seller()  /* metodo Relacion ,  Uno a uno , es decir un producto tiene un vendedor   Relacion uno a uno */
    {
        return $this->belongsTo(Seller::class);   /* => el producto pertenece (BelongsTO) al vendedor puesto que el producto quien lleva  la clave  foránea  */

    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class); /* relacion uno a mucho , product tiene mucha transaccions , asi la transaccion blongsto product   */
    }


    public function categories()  /* metodo relacion , product hacia category , un producto pertenece a varias categorias es decir un producto no solo tiene un categoria sino que tiene varias , y adicionalmente varios productos pueden pertenecer a la misma
                                   categoria asi tenemos entonces relacion de muchos a muchos - vamos a ver durante el curso como se maneja este tipo de relacion mediante una tabla de pivote  */
    {
        return $this->belongsToMany(Category::class);
    }












}

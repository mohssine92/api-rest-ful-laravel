<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Seller;
use App\Models\Category;
use App\Models\Transaction;

class Product extends Model {

    use HasFactory;   /* trait llamado HasFactory ==> gracias a este trait podemos acceder a un metodo que es factory() , y mas metodo que les corresponda ..  */ /* todos modelos usan este tarit */

    // constantes previamente definidas => usadas en  status attribute
    // durante la vida de la app vamos a requerir el estado va saber si el product esta diponible o no
    const PRODUCT_DISPONIBLE = 'disponible';
    const PRODUCTO_NO_DISPONIBLE = 'no disponible';


    protected $fillable = [  // son basicamente attributes que podran ser asignados de manera masiva .
       'name',
       'description',
       'quantity',
       'status',
       'image',
       'seller_id'

    ];   /* status : puede ser diferentes valores , pero en este caso manejamos 2 valores dos posibles estados */


    /*
     * la llamamos cuando requerimos saber si un producto esta disponible o no
    */
    public function estaDiponible()
    {
       return $this->status == Product::PRODUCT_DISPONIBLE;
    }



    /*
     * un producto pertenece a un seller - (user o empresa)
     * relacion de uno a mucho puesto que un seller tiene mucho productos
    */
    public function seller()
    {
      return $this->belongsTo(Seller::class);
    }

    /*
     * basicamente un producto pose de muchas transacciones - un producto esta presente en muchas transcciones
     *
    */
    public function transactions()
    {
       return $this->hasMany(Transaction::class);
    }

    /*
     *  una categoria tiene ralacion de muchos a mucho con products
    */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }












}

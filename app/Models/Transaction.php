<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Buyer;
use App\Models\Product;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [ //  ... y indicando el recurso transaction tiene tres attributes en este caso
       'quantity',  // cantidad del producto en fesico comprado
       'buyer_id',  // clave foraneas hacia comprador - la transaccion pertenece al comprador
       'product_id' // clave foreanea hacia product - la transaccion pertenece al producto
    ];



    /* quien es el comprador ?
     * Relacion de uno a mucho inversa - un transaccion pertenece a un buyer
    */
    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }


    /* que preducto ha sido comprado ?
     *  Relacion de uno a mucho inversa - una transaccion pertenece a un producto
    */
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }


}

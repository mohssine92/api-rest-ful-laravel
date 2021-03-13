<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Buyer;
use App\Models\Product;

class Transaction extends Model       /* => en este curso trataremos una transaccion por un producto algo como mercado libre , no como amazon transacion por producto o transaccion por productos  */
{
    use HasFactory;

    protected $fillable = [
       'quantity',
       'buyer_id',
       'product_id'
    ];

    public function buyer()  /* metodo reelacion entre ercursos */
    {
    	return $this->belongsTo(Buyer::class);  /* un id transaction pertenece a un comprador relaction uno a uno  */
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);  /* un id transaction pertenece a un id producto  relaction uno a uno  */ /* el deseño de este base de datos tratamos un producto por transaction (algo como mercado libre no como amazon) */
    }


}

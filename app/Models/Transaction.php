<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Buyer;
use App\Product;

class Transaction extends Model
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
    	return $this->belongsTo(Product::class);  /* un id transaction pertenece a un id producto  relaction uno a uno  */
    }


}

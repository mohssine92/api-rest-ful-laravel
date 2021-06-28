<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Product;

class Category extends Model
{
   use HasFactory;


   protected $fillable = [  // son basicamente attributes que podran ser asignados de manera masiva .
       'name',
       'descripcion'
   ];


    /*
     * una categoria tiene ralacion de muchos a mucho con products
    */
   public function products()
   {
      return $this->belongsToMany(Product::class);
   }





}

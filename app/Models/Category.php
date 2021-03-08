<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Product;

class Category extends Model
{
    use HasFactory;


   /* => esta propieddad fillable , en su array especificarle cuando se intente agragar un registro por asignacion masiva solo se crea el registro con los campo declarados dentro del array asi evitamos que atraves de herramienta de
    de desarollador se envia en input malioso aprvechando la asignacion masiva , esto es como filltro , asi eloquent hara como este campo no existira solo creara registro con lo que haya asignado en este array  */
   /* laravel ha pensado de otra manera filallable deja gardar los las propiedades declaradas , fijate tenemos 50 campos recebidos del controlador atraves de asignacion masiva , tendremos que declara 50 propiedades dentro del
   arrayd de fillable , asi a cambio tenemos  ==> protected $guarded = []; en esta prop voy asignar solo los campos que este protegidos , todo registra menos el campo declarado  , asi eloquent egnoraria ese campo */

   protected $fillable = [   /*  protected $fillable =>  se puede acceder al atributo desde la clase que lo define y desde cualquier otra que herede de esta clase.  */
       'name',
       'descripcion'

   ];

   public function products()  /* relacion mucho a mucho  , categoria hacia producto*/
   {
       return $this->belongsToMany(Product::class);  /* una Categoria puede tener muchos productos , tener en cuenta un producto lo puede tener mucha categorias    */
   }





}

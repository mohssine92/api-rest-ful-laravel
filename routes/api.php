<?php
/* => apartir laravel 5.4 se esta separando todas las routas que puede tener nuestro proyecto  */ /* por ej : aqui tenemos las routas para api  */ /* ene este curso trabajamos sobre archivo api  */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*  NB : tenemos separados las routas corresponde a una aplicacion web , y routas correspondentes a un api Restfull , => Eso permite entonces tener en mismo proyecto de laravel routas para una api , y para una apliacion web , en que esten con capazidad de
       funccionar en conjunto . sin necesidad de estar juntas todas en el mismo archivo .
         ==> lo que queremos ver ahora ver como funcciona : - Realizar algunas modificaciones que sean accordes de la manera como va funccionar nuestro proyecto puesto que se trata de una apiRestfull como tal .



|--------------------------------------------------------------------------
| API Routes ==>  Iran todas las routas relacionadas con nuestra api RESTfull
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/* => tenemos la routas para la api por ejemplo - las cual vamos modificando a lo largo del curso */

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

/* ------------------------------------------------------------------------------------------------------------------------------------------- */
 /* => es una routa de prueba hace uso de un middleware llamado auth , eso quiere decir si ententamos acceder a la ruta user de la api como tal , tendremos que estar autenticados por
     un token para acceder a ella .  de momento no vamos a trabajar de manera directa con lo que es autenticacion y todo lo que mas relacionado con la api , asi comento esta routa
     y posteriormente vamos agregando las nuestras y como debe ser porsupuesto en la seccion de implementacion de la capa de seguridad estaremos trabajando ya con los middleware de validacion , y como hacerlo con la manera adecuada para nuestra apiRestful.
     Finalmente para comprender de manera profunda  el funccionamiento de las nuevas routas en laravel tenemos que ir a nuestro providers .======> Go to Providers     */
/* ------------------------------------------------------------------------------------------------------------------------------------------- */

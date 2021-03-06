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

/*  Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */
/* ------------------------------------------------------------------------------------------------------------------------------------------- */
 /* => es una routa de prueba hace uso de un middleware llamado auth , eso quiere decir si ententamos acceder a la ruta user de la api como tal , tendremos que estar autenticados por
     un token para acceder a ella .  de momento no vamos a trabajar de manera directa con lo que es autenticacion y todo lo que mas relacionado con la api , asi comento esta routa
     y posteriormente vamos agregando las nuestras y como debe ser porsupuesto en la seccion de implementacion de la capa de seguridad estaremos trabajando ya con los middleware de validacion , y como hacerlo con la manera adecuada para nuestra apiRestful.
     Finalmente para comprender de manera profunda  el funccionamiento de las nuevas routas en laravel tenemos que ir a nuestro providers .======> Go to Providers     */
/* ----------------------------------------------------------------------------------------------------------------------------------------*/

/*  ==> Creacion de las routas :*/   /* comando relacionado php artisan route:list => muestra todas routas hacia acciones de todos controladores que consta  nuestra api  */

/* => Buyer  */
Route::resource('buyers', 'Buyer\BuyerController',['only' => ['index','show']]);
/* => podemos ver que hemos creado con un solo linea un total de 7 routas es lo que nos ofrece el controlador de tipo resource */
/* => es muy probable que nosotros no necesitamos dar acceso a todos estos metodos como es el caso de create y edit , para ellos vamos a hacer una especie de filtros para las rutas de nuestras routas de recursos , esto se hace en el tercer params */
/* no va a permitir ni eleminar y editar compradores permitimos solo ver los comprodares , se hace depende del caso que corresponda  */ /* => despues hemos ejcutado php artisan route:list observamos que las routas se ha reducido a  2 ,es decir todo est bien
hasta ahora *//* no importa que el controlador tenga definidos los otros metodos mientras tengo un filtero de metodos  */

/* => Categories*/
Route::resource('categories', 'Category\CategoryController',['except' => ['create','edit']]);  /* vamos a permitir tidas acciones exepto .... */

/* ==> Products */
Route::resource('products', 'Product\ProductController',['only' => ['index','show']]);  /* vamos a permitir visualizacion solo directamente por este controlador , cuando vayamos a implementar unos controladores un poco mas complejos vamos a comprender a
 profundidad  porque es necesaria la interaccion de otro controlador y  de echo de otro recurso para la creacion o actualizacion de un producto especifico  */

/* ==> Transactions */
Route::resource('transactions', 'Transaction\TransactionController',['only' => ['index','show']]);

/*  ==> Sellers*/
Route::resource('sellers', 'Seller\SellerController',['only' => ['index','show']]);

/* ==> Users */
Route::resource('users', 'User\UserController',['except' => ['create','edit']]);  /* Finalmente para user vamos a permitir todas la operaciones excepto create  y edit que son los que retornan los formularios , tengo que aclara eso no quiere decir que no no vamos a
permitir crear o editar usuarios de hecho lo vamos a permitir pero no atraves de un formulario , sino de manera directa por medio de metodo post o el metodo update o el metodo delete segun corresponda    */




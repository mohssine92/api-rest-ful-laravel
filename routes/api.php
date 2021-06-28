<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes ==>  Iran todas las routas relacionadas con nuestra api RESTfull
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
| * rutas a lo corresponde ApiRestFul
  * para comprender a profundidad funcinamiento de las rutas en laravel tendremos que ir a Providers/RouteServiceProviders
  * te echo un recurso puede tener la cantidad de controladores que requeramos para interactuar lo mismo un controller puede interectuar con varios recursos
  * comando ver la lista de todas las rutas definidas => php artisan route:list
*/


/*
 * Buyers
*/
// ruta de recourso :resource recibe => nombre del recurso usulmnete en plural , ruta del controller en string desde Controllers/, como 3 arg recibe array donde especificamos cual es metodos va aceptar esta ruta como tal por buyer no vamos a permitir eliminar o crear buyer esto lo haremos desde user ,asi limitamos solo permitimos ver los buyers
// si no importa si el controller consta de los demas metodos al uso del 3 arg
Route::resource('buyers', 'Buyer\BuyerController',['only' => ['index','show']]);

/*
 * Categories
*/
Route::resource('categories', 'Category\CategoryController',['except' => ['create','edit']]);  /* vamos a permitir tidas acciones exepto .... */

/*
 * Products
 * porque a los productos permitimos solo visualizacion ? - si solo en este  controlador permitimos solo visualizacion .
 * asi cuando implementamos controladores mas complejos veremos como es el interaccion de controladores y recursos para crear y editar un producto en especifico
*/
Route::resource('products', 'Product\ProductController',['only' => ['index','show']]);

/*
 * Transactions
*/
Route::resource('transactions', 'Transaction\TransactionController',['only' => ['index','show']]);


/*
 * Sellers
*/
Route::resource('sellers', 'Seller\SellerController',['only' => ['index','show']]);



/*
 * Users
 * except create y edit  que returnan los formularios - de hecho aclaramos que vamos a permitir crear users pero usando metodo post put o delete segun corresponde - no por formularios:es de uso html front-end
*/
Route::resource('users', 'User\UserController',['except' => ['create','edit']]);



/*
 * otra forma de llamara controler
 *  esta forma requiere el use requerir el controller
*/
//Route::resource('products',ProductsController::class , ['only' => ['index','show']] );

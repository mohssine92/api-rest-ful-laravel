<?php
/* => apartir laravel 5.4 se esta separando todas las routas que puede tener nuestro proyecto  */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/* => tenemos la routas para la api por ejemplo - tenemos las routas para la web que corresponden simplemente a todo a lo que cerresponde a front end  */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

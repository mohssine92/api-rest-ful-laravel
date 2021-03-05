<?php
/* => apartir laravel 5.4 se esta separando todas las routas que puede tener nuestro proyecto  */ /* por ej : aqui tenemos las routas para api  */ /* ene este curso trabajamos sobre archivo api  */
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


/* => tenemos la routas para la api por ejemplo - las cual vamos modificando a lo largo del curso */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

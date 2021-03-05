<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


   /* aqui tenemos routas para la web , lo que corresponde simplemente a todo lo que corresponde a frontend  */

Route::get('/', function () {
    return view('welcome');
});

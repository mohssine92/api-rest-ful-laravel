<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

/* => este controlador ha sido creado atraves del comando ==>  php artisan make:controller User/UserController -r , es decir controlador de typo resource es un controlador viene con acciones para administrar un recourso en este punto cuando
digo un recourso me refiero al modelo , este es el termino que se usa cuando estamos trabajando en un api .  */

/* ==>  estamos desarollando una apiRestfull para verificar resultado de las funccionalidades de cada controller vamos hacer uso de psotman */

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  /* la llamada al controller en la lista de routas de api se ejecuta esta function , porsupuesta la llama ser atraves de postman*/
    {
        //Eloquent ORM de Laravel obtenemos lista de manera muy sencilla la lsiat de todo ususarios
        $usuarios = User::all();

        /*return $usuarios; */   /* => observo laravel automaticamente ha transformado la colleccion de datos que hemos obtenido en una collecction de objetos Json sin pedirlo   */

        /* NB: ==> aunque laravel devuelve la respuesta en una colleccion de objetos Json , Nosotros vamos a utulizar directamente el metodo de laravel Para poder especificar Un poco la estructura de la respuesta  */
         /*  return response()->json($usuarios, 200);  */   /* => returnamos respuesta de tipo Json usandando metodo de Laravel  */ /* es lo mismo que retorna laravel por defecto */

         /* ==> Ahora bien, sin embargo es muy Importante ser consistentes en la manera en la que retornamos las respuestas para los clientes o usuarios que vayan a consumir nuestra apiRestFull , es muy Importante contar con un elemento Raiz en al respuesta*/
         /* => de estas manera al identificar ese elemento raiz data , puede determinar desde que punto obtener los datos que han solicitado , Hay diferentes estandares de elemento raiz , el mas comun y simple es data */
        return response()->json(['data' => $usuarios], 200);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

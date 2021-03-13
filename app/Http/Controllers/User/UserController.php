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
    public function show($id)  /* => el id se especifica directamente de la url  como 2 params */
    {
         /* $usuario = User::find($id); */  /* usar este metodo , si no encuentra el id buscado retorna data null lo cual no es correcto  */

         /* asi cuando el id no existe retorna data con valor null , lo cual no es corercto debemos retornar un mensaje de typo 404 con mensaje diciendo que el recurso no se encuetra  */ /* en vez de tener agregar un condicional laravel nos ayuda con este metodo  */
          $usuario = User::findOrFail($id);  /* metodo busca y en mismo tiempo pregunta si existe el usuario o no  - automaticamente dispara una excepcion en caso el id buscado no exista  */
                                             /* en un desarollo posterior vamos mejorando estos tipo de detalles , haciendo control de estos tipos de excepciones y mostrando mensajes mas adecuados  */

        /*  esto ['data' => $usuario]  deberia ir en una function , por ahora lo hacemos de este moddo , par ir mostrando paso a paso como se hace la devolucion par ir mejorando nuestro codigo paso a paso posteriormente  */

        return response()->json(['data' => $usuario], 200);

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

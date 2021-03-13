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
     /* =>metodo store nos permite crear instancias de usuarios */
     /* estamos obteniendo por defecto un $request ,basicamente por medio de este objeto request que ha sido inyectado por medio resolucion de dependencias vamos a obtener toda la informacion relacionada
        con la peticion (http) lo cual incluye por supuesto los campos recibidos en la peticion para crear el usurio es decir nombre que se va  utulizar , correo electronico , contraseña eetcc    */
    public function store(Request $request)  /* => para crear instancia la peticion se realiza por medio meto http post */
    {
        $campos = $request->all(); /* $campos recibe todo que venga con la peticion   */ /* de este metodo tendremos en un array() ... lo que acabamos de mencionar es decir la infs que nos va traer objeto request */
                                    /* sabemos tenemos que hacer un control del typado de datos que recibimos como si es email correcto o no , tambien no podemos hacer de uso todo los datos recibidos por los usuarios , ya sabemos los maliosos usuarios
                                     atraves de herramientas del desarollador cuando se trata de aplicacion web o en este caso en especifico tratamos con Apis de frontend como Angular donde no podemos hacer uso de todos los datos que mandan sus formularios
                                     por ejemplo lo que corresponde al campo[ admin y verified ] tienes que ser esteblecidas explicitamente por nosotros y no acorde al que el el usuario envia puesto que nosotros quien decidamos si el usuario es administrador
                                     y si esta verificado o no */


        /* => adicionalmente tenemos que validar que recibamos los campos minimos necesarios , validar que el email sera email valido , validar contraseña y que sea confirmada es decir se envia un campo de confirmacion para validar que el usuario esta
          haciendo la contraseña que cree ,  */
        /* REGLA DE VALIDACION  */
        $rules = [
          'name' => 'required',
          'email' => 'required|email|unique:users',  /* tiene que unico en tabla users */
          'password' => 'required|min:6|confirmed'  /* => tiene que ser confirmada es decir tenemos que recibir un campo llamado password_confirmation = password , mismo valor que password  = password  */
        ];
        /* ejecutar estas reglas validando la peticion , en caso no pasan laravel disparara una exception posteriormente vemos como controlar esta exception de manera sencilla  */
        $this->validate($request, $rules); /* se hace atraves este metodo , pasando la peticion original y las reglas a usar  */



        /* ASIGNACION POR DEFECTO  */  /* se toma estos valores y se ignora valor mandados por un cliente sea angular o react en estos campos en especifico , en casso password se toma valor incryptado porsupuesto  */

        $campos['password'] = bcrypt($request->password); /* => el password tiene que increptarse de manera accorde a los requiremientos de db apartir del valor original por supuesto , usando el helpers bycripts  */
        $campos['verified'] = User::USUARIO_NO_VERIFICADO;/* =>establecer el valor por defecto , Recuerda que los attributos que establecemos por defecto no debemos tomar en cuenta lo que el cliente frontend(angular) asigna como valor a este campo o atributo */
        $campos['verification_token'] = User::generarVerificationToken();/* => token de verificacion , paraque un user verifique su correo electronico , asignamos por defecto ... */
        $campos['admin'] = User::USUARIO_REGULAR; /* => asignamos por defecto que un usuario es un usario regular no es un administrador  */



        /* => Ahora bien creamos una instancia por medio function create de orm  */
        $usuario = User::create($campos);  /* la function create() hace lo que se conece como asignacion masiva es decir que estamos asignado inmediatamente todos attributos que correspondan a este instancia user , No estamos asignando uno por uno  */
                                           /* estamos mandando todo por una vez por medio de un array en este caso el array es $campos , por la asignacion masiva , hemos aplicado lo que conoce como $fillable en el modelo para evitar inyecciones
                                           es decir insersaciones que no queremos */



        return response()->json(['data' => $usuario], 201); /* retornamos respuesta 201 indicando que ya se realizo la operacion de almacenamiento con exito */ /* si te fijas la contraseña y token ..etc no ha sido devuelta en respuesta debido a la propiedad de
                                                              $hiden que usamos en nuestro modelo que es capaz de esconder los atributos que declaramos en su array. refiero a los atrributos del modelo user   */

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

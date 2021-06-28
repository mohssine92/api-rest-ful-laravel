<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;



class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /*
     * de manera particular este modelo no pose de relaciones directas con ninguno de los modelos , sino atraves de los modelos que lo heredan : seller - buyer
    */


    protected $table = 'users'; /* decir de una manera explicita la tabla de este modelo  */

    // usadas para el attribute verify
    const USUARIO_VERIFICADO = '1';
    const USUARIO_NO_VERIFICADO = '0';

    // usuadas para la prop admin - dijo el profesor luego veremos por que es siempre mejor usar estos valores como strings , sean booleanos o number : siempre debe ir como string
    const USUARIO_ADMINISTRADOR = 'true';
    const USUARIO_REGULAR = 'false';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified', // hacemos uso de constantes para determinar si un user esta verificado o no .
        'verification_token', // para verificar justamente su correo electronico atraves de un codigo de verificacion
        'admin', // usamos constantes para saber si el user autenticado es admin o no - en otros caso trabajamos con roles

    ];


    /**
     * The attributes that should be hidden for arrays.
     * es decir cuando laravel convierta el modelo user en una respuesta json , lo que hace lo convierta primero en un array y luego dicho array lo transforma en un formato json
     * por lo cual cualquier attribute incluido en en $hidden sera occultado en nuestras respuestas json _> en nuestra saliada
     * @var array
     */

    protected $hidden = [
        'password',
        'remember_token',// basicamente cuando user inicia session por medio de front-end es decir por medio de interfaz grafica - y tilda la opcion de recordarme : esta parte ayudara si un user debe mantenerse con session activa o no .
        'verification_token', // nadie puede acceder ... paraque luego validarlo de manera incorrecta :_ esta validacion debe realizarse unicamente desde el correo electronico del propitario de esta cuenta del user autenticado
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



  /*
   * para saber si un user esta verificado o no
  */
   public function esVerificado()
   {
      return $this->verified == User::USUARIO_VERIFICADO;
   }


  /*
   *  para saber si un user es administrador o no
   */
   public function esAdministrador()
   {
      return $this->admin == User::USUARIO_ADMINISTRADOR;
   }

  /*
   *  me permit obtener un token de verificacion generado automaticamente
   */
   public static function generarVerificationToken()
  {
      return Str::random(40);  // recomendado desde 25 adelante , en este caso 40
  }










}

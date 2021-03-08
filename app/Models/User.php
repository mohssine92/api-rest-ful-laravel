<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/* => vamos a adaptar el modelo user a las caracteristicas y las necesidades de nuestra apiRestful , laravel trae en su estructura este model llamado user , el cual vamos a usar por supuesto pero tendremos que hacerle algunas adaptaciones a y agregarle
algunos atrributos mas que vamso a requerir   */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const USUARIO_VERIFICADO = '1';     /* segun el profesor sera como mejor practica usar como valor a estos tipos de constantes strings en ves de numeros o booleanos */
    const USUARIO_NO_VERIFICADO = '0';

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
        'verified',
        'verification_token',
        'admin',

    ];
    /* verification_token un atrributto se utlizara justamente para verificar su correo electronico atraves de un correo de verificacion  */
    /* admin es un atrributo nos indica si el usuario es un administrador o no  */


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /* => modelo user justamente por defecto en laravel trae un nuevo atrributo $hidden  : este atrributo basicamente occulta los atrributos incluidos en su array al momento de convertir la representacion de  este modelo en un array , laravel cuando va
     convertir  un modelo en una respuesta json que es lo que vamos a utulizar a lo largo del curso como se trata de una apiRestfull , lo convierte en un array y luego dicho array lo transforma en un formato json . por lo tanto cualquier attributo
     lo incluimos dentro del atrributo $hidden va ser occultado automaticamente en la respuestas de nuestras APIRestful   */
     /* remember_token => que es basicamente el token que se utuliza cuando el usuario inicia session por medio del frontend  es decir atraves de interfaz grafica y tilda la opcion de recordarme entonces esta parte ayudara a determinar si el usuario
      debe mantenerse con una session activa o no  */
      /* verification_token => nadie puede tener acceso al token de verificacion de un usuario especifico para luego validarlo exclusivo el adminiostrador del systema , puesto que esta validacion deberia realizarse unica y exlusivamente desde el correo
      electronico del propitario de esta cuenta de usuario  */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


   /* => metodo para saber si un usuario esta identificado o no  */
   public function esVerificado()
   {
    return $this->verified == User::USUARIO_VERIFICADO;
   }

   /* => para saber si un usuario es administrador o no  */
   public function esAdministrador()
   {
    return $this->admin == User::USUARIO_ADMINISTRADOR;
   }

   /* => metodo publico sera estatico nos permitira obtener un token generado automaticamente  */
   public static function generarVerificationToken()
  {
      return str_random(40);  /* es importante que se genere desde 24 caracteres hacia adelante  */
  }











}

<?php
/* ==>  aqui procedemos creacion de tabla users del modelo user y modificaciones entre otros funcionalidades ... */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');                                   /* porsupuesto tendremos que agregar algunos mas atrributos que requerems utuluzar para nuestra tabla  */
            $table->string('name');
            $table->string('email')->unique();  /* logico un email tiene que ser de valor unico */
            $table->string('password');
            $table->rememberToken(); /* basicamente el token que permitira mantener activa la session de un usuario especialmente en la aplicacion web  */
            $table->string('verified')->default(User::USUARIO_NO_VERIFICADO); /* => ->default funccion agrega valor por defecto */
            $table->string('verification_token')->nullable(); /* nullable() => esta funccion nos da la opcion de que el atrributo sea nulo . no todos usuarios van a tener token de verificacion  */
            $table->string('admin')->default(User::USUARIO_REGULAR);  /* su valor por default .... es el returnado de la funccion estaticade la clase user  */
            $table->timestamps();  /* fecha creacion  -  fecha actualizacion  */
        });
    }
    /* te hecho ya tenemos terminada la migracion para tabla user , al ejecutarla se creara toda la estructura de la tabla utulizando la restrincciones que hemos definido   */
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

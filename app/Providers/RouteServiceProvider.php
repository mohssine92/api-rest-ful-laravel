<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;


 /* este es un provider Route service es para una configuraciones de routas , primero cuando se solicita atraves de archivo para routas api o web , se ejecuta la funccion convenniente , es decir si trata de routa de api se ejecuta una funccion para
  routas de api en en su vez tiene que ejecutar una sirie de middleware para las routas de api y un metodo indicarle hacia donde tiene que derigirse al momento de indicarle una routa hacia un controlodor , que a su vez empieza a separar rutas
  depende de metodos que trae este controlador   */

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
     protected $namespace = 'App\\Http\\Controllers';  /* hemos descomentado esta propiedad , para el tema de crear la rutas hacia controlador  */ /* indicamos a laravel automaticamente hacia donde referirse cuando le indicamos un nombre de un
     controller */

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

         /* RouteServiceProvider especifica la manera en la que funcciona tanto las routas para la api como las routas para la apliacacion web   */



    }

    /* => hemos creado este metodo que aun se sigue llamada de una manera automatizada  en laravel aprovechandola para implementar estos 2  metodos de una manera mas oganizada map() es una function publica*/
    public function map ()
    {

       $this->mapApiRoutes();  /* como el metodo esta llamada en laravel de una manera automatizada , estos dos funccion se ejecutan de una manara automatizada */
       $this->mapWebRoutes();

    }
     /* basicamente lo que estamos haciendo es separa los lugares donde se van registrarse estas routas */
    protected function mapApiRoutes()
    {
         /* ahora todas las peticiones que recibimos sea atendida  directamente desde la RAIZ Como tal : //apirestful.test/ , para ello simplemete hemos eleminado el prefijo Ver foto relacionados al curso  */
         Route::middleware('api')     /* para los de la api esta haciendo uso de un groupo de moddleware llamado api  */
         ->namespace($this->namespace) /* => hacer llamada al metodo name space indicandole que se haga uso del atributo namespace que nosotros acabamos de ,,,,,,,,,,,, */
         ->group(base_path('routes/api.php'));


    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')     /* si vemos para aplicacion web esta haciendo uso de un groupo de moddleware llamado web  */
        ->namespace($this->namespace)
        ->group(base_path('routes/web.php'));


    }





    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}

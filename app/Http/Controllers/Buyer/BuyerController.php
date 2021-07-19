<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\ApiController;
use App\Models\Buyer;
use Illuminate\Http\Request;



/* Operaciones para Model Buyer
 * Video 56 para mas detalles
 *
*/
class BuyerController extends ApiController
{

    /**
     * Display a listing of the resource.
     * mostrar todos compradores que hay en el systema
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // compradores , es decir solo users que tengan transacciones de products , Recordar todo user esta almacenado en tabla users , herencia etc ...
       // has() recibe una Relacion que tenga ese Modelo
       $compradores = Buyer::has('transactions')->get();

       return $this->showAll( $compradores );

    }



    /**
     * Display the specified resource.
     * Obtener instancia de un comprador siempre que si si existe por supuesto
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       /* FindOrFail($id); si no existe el id dispar excepcion debemos manejar de forma corercta
        * cuando no existe es posible que el id no existe o existe pero no realizo ninguna compra , no tiene Transaccion o transacciones que la realcion entre Buyer y Product
        * !! en mercado de pago : Mercado Libre cada venta consta de una trasaccion a la cuenta destinaria : cuenta Vendedor !!
       */
       $comprador = Buyer::has('transactions')->FindOrFail($id);

       return $this->showOne( $comprador );


    }


}

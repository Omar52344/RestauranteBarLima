<?php

namespace App\Http\Controllers;
use App\Models\ProductosXBodega;
use App\Models\pedido;
use App\Models\Usuario;
use App\Models\productosxpedido;
use App\Models\productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //$pedidos = pedido::all();


         $pedidos = DB::select(DB::raw("select * from pedido inner join usuarios on pedido.Mesero=usuarios.id;"));



        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $productos = productos::all();


         $meseros=DB::select(DB::raw("select * from usuarios INNER JOIN
         usuarioxroles on usuarios.id=usuarioxroles.IdUsuario
         INNER JOIN rol on rol.idRol=usuarioxroles.IdRol where rol.idRol=2;"));
        

        return view('pedidos.crear',compact('productos','meseros'));

    }

    public function detalle($id)
    {

        $detallepedido = DB::select(DB::raw("select *from productosxpedido inner join 
        productos on productos.idProducto=productosxpedido.Idproducto where IdPedido='$id'"));

        $pedidod = DB::select(DB::raw("select * from pedido inner join usuarios on usuarios.id=pedido.Mesero where idpedido='$id';"));

        $pedido = $pedidod[0];


        return view('pedidos.detallepedido', compact('pedido', 'detallepedido'));
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
        $bodega=Session::get('bodega');

        $date = Carbon::now();

        $fecha = $date->format('Y-m-d');

        $hora = $date->toTimeString();


      
        //se intancia un objeto pedido
        $pedido = new pedido;


        $final = $request->toArray();
        $conteo = count($final);

        $recuento = $conteo - 3;
        $total = $recuento;
        $doble = $total * 2;

        $pedido->Mesero = $request->Mesero;
        $pedido->Mesa = $request->Mesa;
        
        $pedido->Estado = 1;
        $pedido->horapedido = $fecha;
        $pedido->save();

        $resultado = $pedido->save();


        if ($resultado = 1) {



            $ultimapedido = pedido::max('idpedido');

            $idPedido = $ultimapedido;


            for ($i = 1; $i <= $doble; $i++) {
                $productopedido = new productosxpedido;

                $code = "productCode_" . $i;
                $codigoproducto = $request->$code;


                $productopedido->IdProducto = $codigoproducto;

                $quantity = "quantity_" . $i;
                $cantidadproducto = $request->$quantity;




                $productopedido->Cantidad = $cantidadproducto;



                $price = "price_" . $i;
                $precioproducto = $request->$price;




                $productopedido->Precio = $precioproducto;



                $total = "total_" . $i;
                $totalproducto = $request->$total;
                $productopedido->Total = $totalproducto;



                $avaliable = "avaliable_" . $i;
                $Disponible = $request->$avaliable;
                //$productopedido->Disponible= $Disponible;


                




                $observacion = "Observaciones_" . $i;

                $observacionproducto = $request->$observacion;

                $productopedido->observaciones = $observacionproducto;

                $productopedido->IdPedido = $idPedido;

                $idfacturaproducto = $productopedido->IdPedido;


                


                if ($codigoproducto != null && $cantidadproducto != null && $precioproducto != null && $totalproducto != null &&
                $idfacturaproducto != null && $Disponible !=null) {

                    $productopedido->save();

                    $cantidadnueva=$Disponible-$cantidadproducto;

                    if($Disponible!=null){

                    $resultado = ProductosXBodega::where('IdBodega', $bodega)->where('IdProducto', $codigoproducto)->update(['Cantidad' => $cantidadnueva]);
                   // dd($cantidadnueva);

                    }
                   

                    


                    
                    
                    
                    
                    

                }


            }


        }







        $pedidos = pedido::all();

        return view('pedidos.index', compact('pedidos'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(pedido $pedido)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $detallepedido = DB::select(DB::raw("select *from productosxpedido inner join
        productos on productos.idProducto=productosxpedido.Idproducto where IdPedido='$id'"));

        $pedidod = DB::select(DB::raw("select * from pedido where idpedido=' $id'"));


        $productos=productos::all();


         $meseros=DB::select(DB::raw("select * from usuarios INNER JOIN
         usuarioxroles on usuarios.id=usuarioxroles.IdUsuario
         INNER JOIN rol on rol.idRol=usuarioxroles.IdRol where rol.idRol=2;"));


        $pedido = $pedidod[0];


        return view('pedidos.editar', compact('pedido', 'detallepedido','productos','meseros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $date = Carbon::now();

        $fecha = $date->format('Y-m-d');


        $id = $request->idpedido;
        $estado = $request->Estado;

      $bodega=Session::get('bodega');




        if ($estado == "Finalizado") {


            $resultado = pedido::where('idpedido', $id)->update(['Mesero' => $request->Mesero,
                 'Mesa' => $request->Mesa, 'Estado' =>
                $request->Estado, 'horadespacho' => $fecha]);

        }
        else {


            $resultado = pedido::where('idpedido', $id)->update(['Mesero' => $request->Mesero
                , 'Mesa' => $request->Mesa, 'Estado' =>
                $request->Estado]);


        }




        DB::table('productosxpedido')
            ->where('IdPedido', $id)
            ->delete();



        $final = $request->toArray();
        $conteo = count($final);
        $recuento = $conteo - 3;
        $total = $recuento;
        $doble = $total * 2;


        if ($resultado = 1) {





            $idPedido = $id;


            for ($i = 1; $i <= $doble; $i++) {
                $productopedido = new productosxpedido;
                $code = "productCode_" . $i;
                $codigoproducto = $request->$code;


                $productopedido->IdProducto = $codigoproducto;

                $quantity = "quantity_" . $i;
                $cantidadproducto = $request->$quantity;




                $productopedido->Cantidad = $cantidadproducto;



                $price = "price_" . $i;
                $precioproducto = $request->$price;




                $productopedido->Precio = $precioproducto;



                $total = "total_" . $i;
                $totalproducto = $request->$total;



                $productopedido->Total = $totalproducto;


                $avaliable = "avaliable_" . $i;
                $Disponible = $request->$avaliable;


                $observacion = "Observaciones_" . $i;

                $observacionproducto = $request->$observacion;

                $productopedido->observaciones = $observacionproducto;

                $productopedido->IdPedido = $idPedido;

                $idfacturaproducto = $productopedido->IdPedido;





                if ($codigoproducto != null && $cantidadproducto != null && $precioproducto != null && $totalproducto != null &&
                $idfacturaproducto != null && $Disponible !=null) {

                    $productopedido->save();

                    $cantidadnueva=$Disponible-$cantidadproducto;

                    if($Disponible!=null){

                    $resultado = ProductosXBodega::where('IdBodega', $bodega)->where('IdProducto', $codigoproducto)->update(['Cantidad' => $cantidadnueva]);
                   // dd($cantidadnueva);

                    }
                   

                }


            }


        }






        $pedidos = pedido::all();

        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(pedido $pedido)
    {
    //
    }
}

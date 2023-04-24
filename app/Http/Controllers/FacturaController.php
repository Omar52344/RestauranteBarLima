<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\factura;
use App\Models\productos;
use App\Models\productosxfactura;
use Illuminate\Http\Request;

use Carbon\Carbon;
use PDF;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = factura::all();

        return view('listafacturas.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //session()->regenerate();
        //Session::put('usuario', 'omar Jaramillo');
        //Session::forget('key');
        //Session::forget('usuario');
        $meseros=DB::select(DB::raw("select * from usuarios INNER JOIN
         usuarioxroles on usuarios.id=usuarioxroles.IdUsuario
         INNER JOIN rol on rol.idRol=usuarioxroles.IdRol where rol.idRol=2;"));

         $productos = productos::all();

        $value = session('usuario');
        //echo $value;
        return view('listafacturas.crearfactura', compact('value','meseros','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function adicionar(Request $request)
    {

        $date = Carbon::now();

        $fecha = $date->format('Y-m-d');

        $hora = $date->toTimeString();

        $factura = new factura;



        $factura->FormaPago = $request->formapago;
        $factura->Mesero = $request->Mesero;
        $factura->Mesa = $request->Mesa;
        $factura->Fecha = $fecha;
        $factura->Hora = $hora;
        $factura->ValorSS = $request->ValorSS;
        $factura->ValorDescuento = $request->Retencion;
        $factura->Clientes = $request->Clientes;
        $factura->Descuento = $request->Descuento;
        $factura->Subtotal = $request->subTotal;
        $factura->TasaImpuesto = $request->taxRate;
        $factura->MontoImpuesto = $request->taxAmount;
        $factura->Servicio = $request->Servicio;
        $factura->Total = $request->totalAftertax;
        $factura->Observacion = $request->Observacion;
        $factura->Nota = $request->notes;


        $factura->save();



        $final = $request->toArray();
        $conteo = count($final);
        $recuento = $conteo - 16;
        $total = $recuento;
        $doble = $total * 2;
        $resultado = $factura->save();



        if ($resultado = 1) {



            $ultimafactura = factura::max('idFactura');

            $idFactura = $ultimafactura;


            for ($i = 1; $i <= $doble; $i++) {


                $productofactura = new productosxfactura;


                $code = "productCode_" . $i;
                $codigoproducto = $request->$code;


                $productofactura->IdProducto = $codigoproducto;

                $quantity = "quantity_" . $i;
                $cantidadproducto = $request->$quantity;




                $productofactura->Cantidad = $cantidadproducto;



                $price = "price_" . $i;
                $precioproducto = $request->$price;




                $productofactura->Precio = $precioproducto;



                $total = "total_" . $i;
                $totalproducto = $request->$total;

                $productofactura->Total = $totalproducto;



                $productofactura->IdFactura = $idFactura;

                $idfacturaproducto = $productofactura->IdFactura;


                if ($codigoproducto != null && $cantidadproducto != null && $precioproducto != null && $totalproducto != null && $idfacturaproducto != null) {

                    $productofactura->save();

                }


            }


        }


        $pdf = app('dompdf.wrapper');

        $facturasm = DB::select(DB::raw("select 
        productosxfactura.Cantidad,productosxfactura.Precio,productosxfactura.Total,productos.Descripcion from productosxfactura
        inner join productos on productos.idProducto=productosxfactura.idProducto where IdFactura=' $idFactura'"));

        $facturasu = DB::select(DB::raw("select * from factura where idFactura=' $idFactura'"));


        $objeto = json_encode($facturasm);
        $objeto2 = json_encode($facturasu);
        $facturas = json_decode($objeto, true);
        $facturaunica = json_decode($objeto2, true);





        //$pdf = \PDF::loadView('factura.factura', compact('facturas', 'facturaunica'));
        //$pdf->setPaper([0, 0, 280.732, 1000, 465]);
        //return $pdf->stream('archivo.pdf');


        return redirect('/Facturas');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */

     public function show($Bodega,$id)
    {
        //

         $producto = DB::select(DB::raw(" SELECT * FROM `productoxbodega` inner join productos on productos.idProducto=productoxbodega.IdProducto inner join bodega on bodega.Id_Bodega=productoxbodega.IdBodega where bodega.Id_Bodega='$Bodega' and productos.idProducto='$id';
"));

       




       




        return $producto;


    }



    public function showproducto($id)
    {
        //

         $producto = DB::select(DB::raw(" SELECT * FROM productos where idProducto='$id';"));


       

        return $producto;


    }




    public function detalle($id)
    {

        $facturasm = DB::select(DB::raw("select
        productosxfactura.Cantidad,productosxfactura.Precio,productosxfactura.Total,productos.Descripcion,productos.idProducto
        from productosxfactura inner join productos on productos.idProducto=productosxfactura.idProducto where IdFactura=' $id'"));

        $facturasu = DB::select(DB::raw("select * from factura where idFactura=' $id'"));


        //$myStdClass = (object)$facturasu;

        //return $myStdClass;
        $factura = $facturasu[0];
        $detalle = $facturasm;
        //$conteo = count($detalle);


        return view('factura.detalle', compact('factura', 'detalle'));



    //return $conteo;


    }


    public function imprimir($id)
    {
        $pdf = app('dompdf.wrapper');


        $facturasm = DB::select(DB::raw("select
         productosxfactura.Cantidad,productosxfactura.Precio,productosxfactura.Total,productos.Descripcion from productosxfactura
         inner join productos on productos.idProducto=productosxfactura.idProducto where IdFactura=' $id'"));
        $facturasu = DB::select(DB::raw("select * from factura where idFactura=' $id'"));

        $objeto = json_encode($facturasm);
        $objeto2 = json_encode($facturasu);
        $facturas = json_decode($objeto, true);
        $facturaunica = json_decode($objeto2, true);




        $pdf = \PDF::loadView('factura.factura', compact('facturas', 'facturaunica'));
        $pdf->setPaper([0, 0, 280.732, 1000, 465]);


        return $pdf->stream('archivo.pdf');





    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function editarfactura($id)
    {
        $facturasm = DB::select(DB::raw("select
         productosxfactura.Cantidad,productosxfactura.Precio,productosxfactura.Total,productos.Descripcion,productos.idProducto
         from productosxfactura inner join productos on productos.idProducto=productosxfactura.idProducto where IdFactura='
        $id'"));

        $facturasu = DB::select(DB::raw("select * from factura where idFactura=' $id'"));

         $meseros=DB::select(DB::raw("select * from usuarios INNER JOIN
         usuarioxroles on usuarios.id=usuarioxroles.IdUsuario
         INNER JOIN rol on rol.idRol=usuarioxroles.IdRol where rol.idRol=2;"));


        $factura = $facturasu[0];
        $detalles = $facturasm;


        //$conteo = count($detalles);
        return view('factura.editarfactura', compact('factura', 'detalles','meseros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, factura $factura)
    {
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function ActualizarFactura($id, Request $request)
    {







        $resultado = factura::where('idFactura', $id)->update(['FormaPago' => $request->formapago, 'Mesero' => $request->Mesero, 'Clientes' => $request->Clientes, 'Descuento' => $request->Descuento, 'Mesa' => $request->Mesa, 'ValorSS' => $request->ValorSS, 'ValorDescuento' => $request->Retencion, 'Subtotal' => $request->subTotal, 'TasaImpuesto' => $request->taxRate, 'MontoImpuesto' => $request->taxAmount, 'Servicio' => $request->Servicio, 'Total' => $request->totalAftertax, 'Observacion' => $request->Observacion, 'Nota' => $request->notes]);



        DB::table('productosxfactura')
            ->where('IdFactura', $id)
            ->delete();


        $final = $request->toArray();
        $conteo = count($final);
        $recuento = $conteo - 16;
        $total = $recuento;
        $doble = $total * 2;




        if ($resultado = 1) {



            $ultimafactura = $id;

            $idFactura = $ultimafactura;


            for ($i = 1; $i <= $doble; $i++) {
                $productofactura = new productosxfactura;
                $code = "productCode_" . $i;
                $codigoproducto = $request->$code;


                $productofactura->IdProducto = $codigoproducto;

                $quantity = "quantity_" . $i;
                $cantidadproducto = $request->$quantity;




                $productofactura->Cantidad = $cantidadproducto;



                $price = "price_" . $i;
                $precioproducto = $request->$price;




                $productofactura->Precio = $precioproducto;



                $total = "total_" . $i;
                $totalproducto = $request->$total;

                $productofactura->Total = $totalproducto;



                $productofactura->IdFactura = $idFactura;

                $idfacturaproducto = $productofactura->IdFactura;


                if ($codigoproducto != null && $cantidadproducto != null && $precioproducto != null && $totalproducto != null &&
                $idfacturaproducto != null) {

                    $productofactura->save();

                }


            }


        }



        $facturas = factura::all();

        return view('listafacturas.index', compact('facturas'));

    //return $request;
    }
    public function eliminar($id)
    {
        //

        $facturasm = DB::raw("delete from productosxfactura where IdFactura=' $id'");

        $facturasu = DB::select(DB::raw("delete from factura where idFactura=' $id'"));




        $facturas = factura::all();

        //return view('listafacturas.index', compact('facturas'));
        return redirect('/Facturas');

    }



}

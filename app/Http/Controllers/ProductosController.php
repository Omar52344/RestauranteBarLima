<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;
use App\Imports\ProductosImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $productos = productos::all();

        return view('productos.index', compact('productos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //
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
        $producto = new productos;
        //}
        $producto->idProducto = $request->codigo;
        $producto->Descripcion = $request->Descripcion;
        $producto->Precio = $request->Precio;
        $producto->save();


        $productos = productos::all();


        return view('productos.index', compact('productos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //

        return view('productos.crear');
    }



    public function ListaProductos()
    {
        //

        $productos = productos::all();

        return $productos;

    }



    public function fileImportExport()
    {
        //

        return view('cargas.cargasproductos');
    }



    public function fileImport(Request $request)
    {
        //

        Excel::import(new ProductosImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = DB::select(DB::raw("select * from productos where idProducto=' $id'"));
        $producto = $product[0];

        return view('productos.editar', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //}
        $id = $request->codigo;

        $resultado = productos::where('idProducto', $id)->update(['Descripcion' => $request->Descripcion, 'Precio' => $request->Precio]);


        $productos = productos::all();


        return view('productos.index', compact('productos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $facturasm = DB::raw("delete from Productos where IdFactura=' $id'");
    }
}

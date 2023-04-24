<?php

namespace App\Http\Controllers;

use App\Models\factura;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\pedido;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('Usuarios.login');
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

    public function Loginprocces(Request $request)
    {

        $correo = $request->email;
        $pass = $request->pwd;
        //$user = "vacio";

        
        //$user = DB::table('usuarios')->where('email', $correo)->where('Password', $pass)->first();

        $usuario = DB::select(DB::raw("select  * from usuarios inner join usuarioxroles on usuarioxroles.IdUsuario=usuarios.id 
        inner join usuarioxsede on usuarioxsede.Id_Usuario=usuarios.id
        inner join bodegaxsede on bodegaxsede.IdSede=usuarioxsede.Id_Sede
        where usuarios.email='$correo' and usuarios.Password='$pass'order by usuarioxroles.IdRol asc LIMIT 1
         "));
         
        $user = Usuario::where('email', $correo)->first();


     
       //$user=$usuario[0];

        
        if ($user && Hash::check($pass, $user->Password)) {
            //session()->regenerate();
            Session::forget('perfil');
            Session::forget('usuario');
            Session::forget('bodega');

            $id=$user->id;

            $usuario = DB::select(DB::raw("select  * from usuarios inner join usuarioxroles on usuarioxroles.IdUsuario=usuarios.id 
           inner join usuarioxsede on usuarioxsede.Id_Usuario=usuarios.id
           inner join bodegaxsede on bodegaxsede.IdSede=usuarioxsede.Id_Sede
           where usuarios.id='$id' order by usuarioxroles.IdRol asc LIMIT 1
            "));

           $loguser=$usuario[0];


            Session::put('usuario', $loguser->usuario);
            Session::put('perfil', $loguser->IdRol);
            Session::put('bodega', $loguser->IdBodega);
            //Session::forget('key');
            //Session::forget('usuario');
            $value = session('perfil');

            $rsta = "te has logeado correctamente con el perfil  " . $value;
            //$rsta = $value;

            $pedidos = pedido::all();

        return view('pedidos.index', compact('pedidos'));

        }
        else  {

            $rsta = "error de login";

            return view('Usuarios.invalid', compact('rsta'));
        }



    }

    public function Logout(Request $request)
    {
        Session::forget('perfil');
        Session::forget('usuario');

        return view('Usuarios.login');
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
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
    //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
    //
    }
}

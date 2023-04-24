<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\factura;
use App\Models\productos;
use App\Models\Bodega;
use App\Models\BodegaXSede;
use App\Models\ProductosXBodega;
use App\Models\Roles;
use App\Models\Sedes;
use App\Models\Usuario;
use App\Models\UsuariosXRoles;
use App\Models\UsuariosXSede;
use Illuminate\Support\Facades\Hash;
use App\Models\productosxfactura;


use Illuminate\Http\Request;

use Carbon\Carbon;
use PDF;




class AdminController extends Controller
{



    public function usuarios()
    {
        $usuarios = Usuario::all();

        

        return view('Usuarios.index', compact('usuarios'));
    }


    public function detalleusuario($id)
    {

        $usuario = DB::select(DB::raw("select * from usuarios where id=' $id'"));

        
        $detalle=$usuario[0];
        


        return view('Usuarios.Editar', compact('detalle'));


     }


     public function eliminarusuario($id)
    {
        //
        
        $affectedRows = DB::table('usuarios')->where('id', $id)->delete();


        




       

       
        return redirect('/Usuarios');

    }


    public function updateusuario(Request $request)
    {
        //}
        $id = $request->id;
        
        $resultado = Usuario::where('id', $id)->update(['usuario' => $request->Usuario, 'email' => $request->Email,'Password' => Hash::make($request->Password)]);


        


        return redirect('/Usuarios');
    }



    public function store(Request $request)
    {
        //
        $usuario = new Usuario;
        //}
        //$producto->idProducto = $request->codigo;
        $usuario->usuario = $request->Usuario;
        $usuario->email = $request->Email;
        $usuario->Password = Hash::make($request->Password);

        $usuario->save();


        return redirect('/Usuarios');
    }



     public function nuevousuario()
    {
      


        return view('Usuarios.Crear');

    }



        public function listausuariosxsede()
    {



         


         $usuariosXSede = DB::select(DB::raw("SELECT * FROM `usuarioxsede` INNER JOIN sedes on usuarioxsede.Id_Sede=sedes.Id_Sede inner join `usuarios` on usuarios.id=usuarioxsede.Id_Usuario;"));

         $UsuariosXSede=$usuariosXSede;

         
        return view('Usuarios.UsuariosXSede',compact('UsuariosXSede'));

    }



    public function editarusuarioxsede($id)
    {



         $usuarioXSede = DB::select(DB::raw("SELECT * FROM `usuarioxsede` INNER JOIN sedes on usuarioxsede.Id_Sede=sedes.Id_Sede inner join `usuarios` on usuarios.id=usuarioxsede.Id_Usuario
          where usuarioxsede.Id_Usuario_X_Sede='$id'"));


          $usuarios = Usuario::all();

          $sedes=Sedes::all();
        
     // print_r($usuarioXSede);
       $usuarioXsede= $usuarioXSede[0];

      


        return view('Usuarios.EditarUsuariosXSede',compact('usuarioXsede','usuarios','sedes'));


     }



     public function updateusuarioxsede(Request $request)
    {
        //}
        $id = $request->id;


        $resultado = UsuariosXSede::where('Id_Usuario_X_Sede', $id)->update(['Id_Usuario' => $request->Usuario, 'Id_Sede' => $request->Sede]);


        


        return redirect('/ListaUsuariosXSede');
    }



    public function crearusuarioxsede()
    {


          $usuarios = Usuario::all();

          $sedes=Sedes::all();
        
     
     
        return view('Usuarios.CrearUsuariosXSede',compact('usuarios','sedes'));


     }





      public function agregarusuarioxsede(Request $request)
    {
        //
        $usuarioxsede = new UsuariosXSede;
        //}
        //$producto->idProducto = $request->codigo;
        $usuarioxsede->Id_Usuario = $request->Usuario;
        $usuarioxsede->Id_Sede = $request->Sede;
        

        $usuarioxsede->save();


        
        return redirect('/ListaUsuariosXSede');
    }





     public function eliminarusuarioxsede($id)
    {
        //
        
        $affectedRows = DB::table('usuarioxsede')->where('Id_Usuario_X_Sede', $id)->delete();


        




       

       
        return redirect('/ListaUsuariosXSede');

    }



    public function listausuariosxroles()
    {



         


         $UsuariosXRol = DB::select(DB::raw("SELECT * FROM `usuarioxroles` INNER JOIN rol on usuarioxroles.IdRol=rol.idRol inner join `usuarios` on usuarios.id=usuarioxroles.IdUsuario;"));

         //$UsuariosXSede=$usuariosXSede;

         
        return view('Usuarios.UsuariosXRoles',compact('UsuariosXRol'));

    }



    public function editarusuarioxrol($id)
    {



         $usuarioXRol = DB::select(DB::raw("SELECT * FROM `usuarioxroles` INNER JOIN rol on usuarioxroles.IdRol=rol.idRol inner join `usuarios` on usuarios.id=usuarioxroles.IdUsuario

          where Id_Usuario_X_Rol='$id'"));



          $usuarios = Usuario::all();

          $roles=Roles::all();
        
     // print_r($usuarioXSede);
         $UsuarioXRol= $usuarioXRol[0];

      


        return view('Usuarios.EditarUsuarioXRol',compact('UsuarioXRol','usuarios','roles'));


     }




      public function updateusuarioxrol(Request $request)
    {
        //}
        $id = $request->id;


        $resultado = UsuariosXRoles::where('Id_Usuario_X_Rol', $id)->update(['IdUsuario' => $request->Usuario, 'IdRol' => $request->Rol]);


        


        return redirect('/ListaUsuariosXRoles');
    }




    public function crearusuarioxrol()
    {


          $usuarios = Usuario::all();

          $roles=Roles::all();
        
     
     
        return view('Usuarios.CrearUsuariosXRol',compact('usuarios','roles'));


     }



       public function agregarusuarioxrol(Request $request)
    {
        //
        $usuarioxrol = new UsuariosXRoles;
        //}
        //$producto->idProducto = $request->codigo;
        $usuarioxrol->IdUsuario = $request->Usuario;
        $usuarioxrol->IdRol = $request->Rol;
        

        $usuarioxrol->save();


        
        return redirect('/ListaUsuariosXRoles');
    }


        public function eliminarusuarioxrol($id)
    {
        //
        
        $affectedRows = DB::table('usuarioxroles')->where('Id_Usuario_X_Rol', $id)->delete();


        




       

       
        return redirect('/ListaUsuariosXRoles');

    }


    public function listabodegas()
    {
        //

        $bodegas = Bodega::all();

        return view('Bodegas.index', compact('bodegas'));

    }


    public function editarbodega($id)
    {

        $bodeg= DB::select(DB::raw("select * from bodega where Id_Bodega=' $id'"));

        $bodega = $bodeg[0];

        return view('Bodegas.Editar', compact('bodega'));
    }


    public function updatebodega(Request $request)
    {
        //}
        $id = $request->id;

        $resultado = Bodega::where('Id_Bodega', $id)->update(['DescripcionBodega' => $request->Descripcion,]);



       return redirect('/ListaBodegas');
    }


     public function crearbodega()
    {
       

        return view('Bodegas.Crear');
    }



    public function storebodega(Request $request)
    {
        //
        $bodega = new Bodega;
        //}
        $bodega->DescripcionBodega = $request->Descripcion;
    
        $bodega->save();



       return redirect('/ListaBodegas');


    }


     public function listabodegasxsede()
    {


         $BodegasXSede = DB::select(DB::raw("SELECT * FROM `bodegaxsede` inner join sedes on sedes.Id_Sede=bodegaxsede.IdSede inner join bodega on bodega.Id_Bodega=bodegaxsede.IdBodega;"));

         //$UsuariosXSede=$usuariosXSede;

         
        return view('Bodegas.BodegaXSede',compact('BodegasXSede'));


    }


    public function editarbodegaxsede($id)
    {



        $bodegasXSede = DB::select(DB::raw("SELECT * FROM `bodegaxsede` inner join sedes on sedes.Id_Sede=bodegaxsede.IdSede inner join bodega on bodega.Id_Bodega=bodegaxsede.IdBodega
       where Id_Bodega_X_Sede='$id'

;"));
;



          $sedes = Sedes::all();

          $bodegas=Bodega::all();
        
     // print_r($usuarioXSede);
          $BodegasXSede= $bodegasXSede[0];

      


        return view('Bodegas.EditarBodegaXSede',compact('BodegasXSede','bodegas','sedes'));


     }




     public function updatebodegaxsede(Request $request)
    {
        //}
        $id = $request->id;


        $resultado = BodegaXSede::where('Id_Bodega_X_Sede', $id)->update(['IdBodega' => $request->Bodega, 'IdSede' => $request->Sede]);


        


        return redirect('/ListaBodegasXSede');
    }




    public function crearbodegaxsede()
    {


          $bodegas = Bodega::all();

          $sedes=Sedes::all();
        
     
     
        return view('Bodegas.CrearBodegaXSede',compact('bodegas','sedes'));


     }




       public function agregarbodegaxsede(Request $request)
    {
        //
        $bodegaxsede = new BodegaXSede;
        //}
        //$producto->idProducto = $request->codigo;
        $bodegaxsede->IdBodega = $request->Bodega;
        $bodegaxsede->IdSede = $request->Sede;
        

        $bodegaxsede->save();


        
        return redirect('/ListaBodegasXSede');
    }





       public function eliminarbodegaxsede($id)
    {
        //
        
        $affectedRows = DB::table('bodegaxsede')->where('Id_Bodega_X_Sede', $id)->delete();


        




       

       
        return redirect('/ListaBodegasXSede');

    }



    public function listaproductosxbodega()
    {



         


         $ProductosXBodega = DB::select(DB::raw("SELECT * FROM `productoxbodega` inner join productos on productos.idProducto=productoxbodega.IdProducto inner join bodega on bodega.Id_Bodega=productoxbodega.IdBodega;"));

         //$UsuariosXSede=$usuariosXSede;

         
        return view('productos.ProductosXBodega',compact('ProductosXBodega'));

    }






    public function editarproductoxbodega($id)
    {



    $productosXBodega = DB::select(DB::raw("SELECT * FROM `productoxbodega` inner join productos on productos.idProducto=productoxbodega.IdProducto inner join bodega on bodega.Id_Bodega=productoxbodega.IdBodega
      where id_Producto_X_Bodega='$id'
     "));

;



          $productos = productos::all();

          $bodegas=Bodega::all();
        
     // print_r($usuarioXSede);
          $ProductosXBodega = $productosXBodega[0];

      


        return view('productos.EditarProductoXBodega',compact('ProductosXBodega','bodegas','productos'));


     }



     public function updateproductosxbodega(Request $request)
    {
        //}
        $id = $request->id;


        $resultado = ProductosXBodega::where('Id_Producto_X_Bodega', $id)->update(['IdProducto' => $request->Producto, 'IdBodega' => $request->Bodega,'Cantidad'=>$request->Cantidad]);


        


        return redirect('/ListaProductosXBodega');
    }




    public function crearproductoxbodega()
    {


          $productos = productos::all();

          $bodegas=Bodega::all();
        
     
     
        return view('productos.CrearProductoXBodega',compact('bodegas','productos'));


     }



      public function agregarproductoxbodega(Request $request)
    {
        //
        $productoxbodega = new ProductosXBodega;
        //}
        //$producto->idProducto = $request->codigo;
        $productoxbodega ->IdProducto = $request->Producto;
        $productoxbodega ->IdBodega = $request->Bodega;
        $productoxbodega ->Cantidad= $request->Cantidad;

        $productoxbodega->save();


        
        return redirect('/ListaProductosXBodega');
    }


     public function eliminarproductoxbodega($id)
    {
        //

        
        $affectedRows = DB::table('productoxbodega')->where('Id_Producto_X_Bodega', $id)->delete();


        




       

       
        return redirect('/ListaProductosXBodega');

    }


    public function listasedes()
    {
        //

        $sedes=Sedes::all();


        
        return view('Sedes.index', compact('sedes'));

    }


    public function editarsede($id)
    {

        $sed= DB::select(DB::raw("select * from sedes where Id_Sede=' $id'"));

        $sede = $sed[0];

        return view('Sedes.Editar', compact('sede'));
    }




     public function updatesede(Request $request)
    {
        //}
        $id = $request->id;


        $resultado = Sedes::where('Id_Sede', $id)->update(['Descripcion_Sede' => $request->Descripcion, 'Direccion' => $request->Direccion]);


        


        return redirect('/ListaSedes');
    }



    public function storesede(Request $request)
    {
        //
        $sedes = new Sedes;
        //}
        $sedes->Descripcion_Sede = $request->Descripcion;

        $sedes->Direccion = $request->Direccion;
    
        $sedes->save();



       return redirect('/ListaSedes');


    }


    public function crearsede()
    {
       

        return view('Sedes.Crear');
    }

}

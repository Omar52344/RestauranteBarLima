<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosxfacturaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\AdminController;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */







/*facturas------------------------------------------------------------------------------*/
Route::get('/NuevaFactura', [FacturaController::class , 'create'])->name('Nuevafacturas');


Route::get('/Facturas', [FacturaController::class , 'index'])->name('listafacturas');



Route::get('/Producto/{Bodega}/{id}', [FacturaController::class , 'show'])->name('consultarproducto');


Route::get('/ProductoUnico/{id}', [FacturaController::class , 'showproducto']);


Route::post('/Registrar', [FacturaController::class , 'adicionar'])->name('Registrar');



Route::get('/Detalles/{id}', [FacturaController::class , 'detalle']);


Route::get('/Editar/{id}', [FacturaController::class , 'editarfactura']);


Route::get('/Imprimir/{id}', [FacturaController::class , 'imprimir']);


Route::get('/EditarUsuario/{id}', [AdminController::class , 'detalleusuario']);


Route::get('/EliminarUsuario/{id}', [AdminController::class , 'eliminarusuario']);



Route::post('/AgregarUsuarioXSede/', [AdminController::class , 'agregarusuarioxsede']);


Route::post('/AgregarUsuarioXRol/', [AdminController::class , 'agregarusuarioxrol']);


Route::post('/ActualizarUsuario', [AdminController::class , 'updateusuario']);


Route::post('/ActualizarUsuarioXSede', [AdminController::class , 'updateusuarioxsede']);

Route::post('/ActualizarUsuarioXRol', [AdminController::class , 'updateusuarioxrol']);

Route::get('/EliminarUsuarioXSede/{id}', [AdminController::class , 'eliminarusuarioxsede']);

Route::get('/EliminarUsuarioXRol/{id}', [AdminController::class , 'eliminarusuarioxrol']);



Route::get('/EliminarProductoXBodega/{id}', [AdminController::class , 'eliminarproductoxbodega']);



Route::post('/CrearUsuario', [AdminController::class , 'store']);

Route::get('/ListaUsuariosXSede', [AdminController::class , 'listausuariosxsede']);


Route::get('/ListaUsuariosXRoles', [AdminController::class , 'listausuariosxroles']);


Route::get('/ListaProductosXBodega', [AdminController::class , 'listaproductosxbodega']);



Route::get('/EditarProductoXBodega/{id}', [AdminController::class , 'editarproductoxbodega']);



Route::post('/ActualizarProductosXBodega', [AdminController::class , 'updateproductosxbodega']);



Route::get('/NuevoProductoXBodega', [AdminController::class , 'crearproductoxbodega']);


Route::post('/AgregarProductosXBodega/', [AdminController::class , 'agregarproductoxbodega']);



Route::get('/NuevoUsuarioXSede', [AdminController::class , 'crearusuarioxsede']);


Route::get('/NuevoUsuarioXRol', [AdminController::class , 'crearusuarioxrol']);

Route::get('/EditarUsuarioXSede/{id}', [AdminController::class , 'editarusuarioxsede']);


Route::get('/EditarUsuarioXRol/{id}', [AdminController::class , 'editarusuarioxrol']);



Route::get('/EditarBodegaXSede/{id}', [AdminController::class , 'editarbodegaxsede']);

Route::post('/ActualizarBodegaXSede', [AdminController::class , 'updatebodegaxsede']);



Route::post('/AgregarBodegaXSede/', [AdminController::class , 'agregarbodegaxsede']);



Route::get('/EliminarBodegaXSede/{id}', [AdminController::class , 'eliminarbodegaxsede']);



Route::get('/NuevoUsuario', [AdminController::class , 'nuevousuario']);


Route::get('/EditarBodega/{id}', [AdminController::class , 'editarbodega']);


Route::post('/ActualizarBodega', [AdminController::class , 'updatebodega']);


Route::get('/NuevoBodega', [AdminController::class , 'crearbodega']);



Route::post('/CrearBodega', [AdminController::class , 'storebodega']);



Route::get('/ListaBodegasXSede', [AdminController::class , 'listabodegasxsede']);



Route::get('/NuevoBodegaXSede', [AdminController::class , 'crearbodegaxsede']);




Route::get('/importar', [ProductosController::class , 'fileImportExport'])->name('importar');

Route::post('/importararchivo', [ProductosController::class , 'fileImport'])->name('importararchivo');



Route::get('/Usuarios', [AdminController::class , 'usuarios']);




Route::get('/ListaProductos', [ProductosController::class , 'ListaProductos'])->name('ListaProductos');



Route::get('/ListaBodegas', [AdminController::class , 'listabodegas']);



Route::get('/ListaSedes', [AdminController::class , 'listasedes']);



Route::get('/EditarSede/{id}', [AdminController::class , 'editarsede']);



Route::get('/NuevoSede', [AdminController::class , 'crearsede']);



Route::post('/ActualizarSede', [AdminController::class , 'updatesede']);



Route::post('/CrearSede', [AdminController::class , 'storesede']);



Route::get('/login', [UsuarioController::class , 'index']);


Route::post('/loginuser', [UsuarioController::class , 'Loginprocces']);

Route::post('/logout', [UsuarioController::class , 'Logout']);

Route::post('/ActualizarFactura/{id}', [FacturaController::class , 'ActualizarFactura']);


Route::get('/Eliminar/{id}', [FacturaController::class , 'eliminar']);

Route::get('/', [PedidoController::class , 'index']);
Route::get('/Pedidos', [PedidoController::class , 'index']);


Route::get('/DetallePedido/{id}', [PedidoController::class , 'detalle']);


Route::get('/Productos', [ProductosController::class , 'index']);


Route::get('/EditarProducto/{id}', [ProductosController::class , 'edit']);


Route::post('/ActualizarProducto', [ProductosController::class , 'update']);


Route::get('/EliminarProducto/{id}', [ProductosController::class , 'destroy']);


Route::get('/CrearPedido', [PedidoController::class , 'create']);


Route::post('/NuevoPedido', [PedidoController::class , 'store']);



Route::get('/EditarPedido/{id}', [PedidoController::class , 'edit']);



Route::post('/ActualizarPedido', [PedidoController::class , 'update']);


Route::get('/NuevoProducto', [ProductosController::class , 'show']);



Route::post('/CrearProducto', [ProductosController::class , 'store']);

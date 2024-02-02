<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//-- raiz a login
Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Usuarios
    Route::get('/usuarios/', [UserController::class, 'index'])->name('user.listado');
    Route::get('/usuarios/create', [UserController::class, 'create'])->name('user.agregar');
    //Route::get('/usuarios/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

    //Productos
    Route::get('/productos/', [ProductoController::class, 'index'])->name('producto.listado');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('producto.agregar');
    Route::get('/productos/modificar/{id}', [ProductoController::class, 'edit'])->name('producto.modificar');
    Route::get('/productos/delete/{id}', [ProductoController::class, 'delete'])->name('producto.delete');
    Route::get('/productos/detalle/{id}', [ProductoController::class, 'detalle'])->name('producto.detalle');
    Route::get('/productos/descripcion', [ProductoController::class, 'descripcion'])->name('producto.descripcion');
   
    //Proveedores
    Route::get('/proveedores/', [ProveedorController::class, 'index'])->name('proveedor.listado');
    Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedor.agregar');
    Route::get('/proveedores/modificar/{id}', [ProveedorController::class, 'edit'])->name('proveedor.modificar');
    Route::get('/proveedores/delete/{id}', [ProveedorController::class, 'delete'])->name('proveedor.delete');

    //Ventas
    Route::get('/ventas/', [VentaController::class, 'index'])->name('venta.listado');
    Route::get('/ventas/create', [VentaController::class, 'create'])->name('venta.agregar');
    Route::get('/ventas/modificar/{id}', [VentaController::class, 'edit'])->name('venta.modificar');
    Route::get('/ventas/delete/{id}', [VentaController::class, 'delete'])->name('venta.delete');
    Route::get('/ventas/caja/', [VentaController::class, 'caja'])->name('venta.caja');
    Route::get('/ventas/detalle/{id}', [VentaController::class, 'detalle'])->name('venta.detalle');
    Route::get('/ventas/ca,bios', [VentaController::class, 'cambios'])->name('venta.cambios');

    //Compras
    Route::get('/compras/', [CompraController::class, 'index'])->name('compras.listado');
    Route::get('/compras/create', [CompraController::class, 'create'])->name('compras.agregar');
    Route::get('/compras/modificar/{id}', [CompraController::class, 'edit'])->name('compras.modificar');
    Route::get('/compras/delete/{id}', [CompraController::class, 'delete'])->name('compras.delete');
    Route::get('/compras/detalle/{id}', [CompraController::class, 'detalle'])->name('compras.detalle');

    
   
   
});

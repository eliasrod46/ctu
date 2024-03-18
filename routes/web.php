<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//-- rootDir login(notLogged)/dashboard(logged)
Route::get('/', function () {
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return redirect()->route('login');

});

//-- User Profile group routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//-- protected login routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    // Suppliers

    Route::resource('/suppliers', SupplierController::class);
    
    
});







//-- example
// Route::get('/dashboard', function () {
    // return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



// //Productos -> to replace
// Route::get('/productos/', [ProductoController::class, 'index'])->name('producto.listado');
// Route::get('/productos/create', [ProductoController::class, 'create'])->name('producto.agregar');
// Route::get('/productos/modificar/{id}', [ProductoController::class, 'edit'])->name('producto.modificar');
// Route::get('/productos/delete/{id}', [ProductoController::class, 'delete'])->name('producto.delete');
// Route::get('/productos/detalle/{id}', [ProductoController::class, 'detalle'])->name('producto.detalle');
// Route::get('/productos/descripcion', [ProductoController::class, 'descripcion'])->name('producto.descripcion');
// //Products
// Route::resource('/products', ProductController::class);
// //Usuarios
// Route::get('/usuarios/', [UserController::class, 'index'])->name('user.listado');
// Route::get('/usuarios/create', [UserController::class, 'create'])->name('user.agregar');
// //Route::get('/usuarios/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
// //Proveedores
// Route::get('/proveedores/', [ProveedorController::class, 'index'])->name('proveedor.listado');
// Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedor.agregar');
// Route::get('/proveedores/modificar/{id}', [ProveedorController::class, 'edit'])->name('proveedor.modificar');
// Route::get('/proveedores/delete/{id}', [ProveedorController::class, 'delete'])->name('proveedor.delete');
// //Ventas
// Route::get('/ventas/', [VentaController::class, 'index'])->name('venta.listado');
// Route::get('/ventas/create', [VentaController::class, 'create'])->name('venta.agregar');
// Route::get('/ventas/modificar/{id}', [VentaController::class, 'edit'])->name('venta.modificar');
// Route::get('/ventas/delete/{id}', [VentaController::class, 'delete'])->name('venta.delete');
// Route::get('/ventas/caja/', [VentaController::class, 'caja'])->name('venta.caja');
// Route::get('/ventas/detalle/{id}', [VentaController::class, 'detalle'])->name('venta.detalle');
// Route::get('/ventas/ca,bios', [VentaController::class, 'cambios'])->name('venta.cambios');
// //Compras
// Route::get('/compras/', [CompraController::class, 'index'])->name('compras.listado');
// Route::get('/compras/create', [CompraController::class, 'create'])->name('compras.agregar');
// Route::get('/compras/modificar/{id}', [CompraController::class, 'edit'])->name('compras.modificar');
// Route::get('/compras/delete/{id}', [CompraController::class, 'delete'])->name('compras.delete');
// Route::get('/compras/detalle/{id}', [CompraController::class, 'detalle'])->name('compras.detalle');













require __DIR__.'/auth.php';

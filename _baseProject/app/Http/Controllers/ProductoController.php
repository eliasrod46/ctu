<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){

        return view('producto.listado');
    }

    public function create(){

        return view('producto.create');
    }

    public function detalle($id){

        $producto = Producto::findOrFail($id);
        return view('producto.detalle', compact('producto'));
    }

    public function edit($id){

        $producto = Producto::findOrFail($id);
        return view('producto.modificar', compact('producto'));
    }

    public function delete($id){

        $producto = Producto::findOrFail($id);
        $producto->delete();
    }

    public function descripcion(){

        return view('producto.descripcion');
    }
}

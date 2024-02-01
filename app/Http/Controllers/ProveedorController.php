<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(){

        return view('proveedor.listado');
    }

    public function create(){

        return view('proveedor.create');
    }

    public function edit($id){

        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor.modificar', compact('proveedor'));
    }

    

}

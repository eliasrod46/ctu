<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index(){

        return view('compras.listado');
    }

    public function create(){

        return view('compras.create');
    }

    public function edit($id){

        $compra = Compra::findOrFail($id);
        return view('compras.modificar', compact('compra'));
    }

    public function detalle($id){

        $compra = Compra::findOrFail($id);
        return view('compras.detalle', compact('compra'));
    }


}

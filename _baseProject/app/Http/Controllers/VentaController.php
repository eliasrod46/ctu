<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index(){

        return view('venta.listado');
    }

    public function create(){

        return view('venta.create');
    }

    public function edit($id){

        $venta = Venta::findOrFail($id);
        return view('venta.modificar', compact('venta'));
    }

    public function detalle($id){

        $venta = Venta::findOrFail($id);
        return view('venta.detalle', compact('venta'));
    }

    public function caja(){

        return view('venta.caja');
    }

    public function cambios(){

        return view('venta.cambios');
    }

}

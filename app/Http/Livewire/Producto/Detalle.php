<?php

namespace App\Http\Livewire\Producto;

use App\Models\Producto;
use App\Models\Proveedor;
use Livewire\Component;

class Detalle extends Component
{

    public Producto $producto;
    public $codigo, $descripcion, $precioCosto, $precioFinal, $imagen, $cantidad, $proveedor, $color, $tipodeprenda, $talle, $marca;
    public function mount(){

        $this->codigo = $this->producto->codigo;
        $this->descripcion = $this->producto->descripcion;
        $this->precioCosto = $this->producto->precioCosto;
        $this->precioFinal = $this->producto->precioFinal;
        $this->cantidad = $this->producto->cantidad;
        $this->imagen = $this->producto->imagen;
        $this->color = $this->producto->color;
        $this->tipodeprenda = $this->producto->tipodeprenda;
        $this->talle = $this->producto->talle;
        $this->marca = $this->producto->marca;
        
        $proveedor = Proveedor::find($this->producto->proveedor);
        $this->proveedor = $proveedor->nombre;

        
    }

    public function render()
    {
        return view('livewire.producto.detalle');
    }
}

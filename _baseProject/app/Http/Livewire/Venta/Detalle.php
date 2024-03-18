<?php

namespace App\Http\Livewire\Venta;

use App\Models\Producto;
use App\Models\Venta;
use Livewire\Component;

class Detalle extends Component
{
    public Venta $venta;
    public $vendedor, $cantidadprenda, $fecha_y_hora, $monto, $descripcion, $producto, $formadepago, $preciodeventa,$operacion,$cantidaddelooperado,$imagen, $comprobantepago, $transacciontipo, $codigotransaccion;
    public function mount(){

        $producto = Producto::where('id', $this->venta->producto)->first();

        $this->vendedor = $this->venta->vendedor;
        $this->cantidadprenda = $this->venta->cantidadprenda;
        $this->monto = $this->venta->monto;
        $this->descripcion = $this->venta->descripcion;
        $this->producto = $producto->codigo;
        $this->formadepago = $this->venta->formadepago;
        $this->preciodeventa = $this->venta->preciodeventa;
        $this->operacion = $this->venta->operacion;
        $this->cantidaddelooperado = $this->venta->cantidaddelooperado;
        $this->imagen = $producto->imagen;
        $this->comprobantepago = $this->venta->comprobantepago;
        $this->fecha_y_hora = $this->venta->fecha_y_hora;
        $this->transacciontipo = $this->venta->transacciontipo;
        $this->codigotransaccion = $this->venta->codigotransaccion;
    }
    public function render()
    {
        return view('livewire.venta.detalle');
    }
}

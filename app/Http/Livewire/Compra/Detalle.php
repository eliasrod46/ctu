<?php

namespace App\Http\Livewire\Compra;

use App\Models\Compra;
use Livewire\Component;

class Detalle extends Component
{
    public Compra $compra;
    public $descripcion, $compraconcaja, $compraconotro, $comprobantepago, $formadepago, $comprador, $factura, $fecha_y_hora;

    public function mount(){
        $this->descripcion = $this->compra->descripcion;
        $this->compraconcaja = $this->compra->compraconcaja;
        $this->compraconotro = $this->compra->compraconotro;
        $this->comprobantepago = $this->compra->comprobantepago;
        $this->formadepago = $this->compra->formadepago;
        $this->comprador = $this->compra->comprador;
        $this->factura = $this->compra->factura;
        $this->fecha_y_hora = $this->compra->fecha_y_hora;
    }


    public function render()
    {
        return view('livewire.compra.detalle');
    }
}

<?php

namespace App\Http\Livewire\Venta;

use App\Models\Producto;
use App\Models\Tipo;
use App\Models\Venta;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Throwable;

class Cambios extends Component
{
    use LivewireAlert;

    public $ventas, $productos, $tipocambios, $vendedores, $vendedor, $descripcion, $formasdepago, $descuentos, $venta, $descuentoSeleccionado, $codigoproducto, $productoseleccionado;
    public $propiedades;
    public $selectedOption, $fecha_y_hora, $opcseleccionada, $opcionseleccionada, $devseleccionada, $devolucionsseleccionada;
    public $infoProducto, $infodeventa, $tiposdev;
    public $montoObtenidodespuesdelcambio, $cantidaddeprendasdevueltas, $cantidaddevuelto, $montodevparcial, $totalDev, $montodevtotal;
    public $stockdevuelto, $transacciontipo, $tipodeTransaccion;

    /*public $search = '';
    public $selectedItem = null;*/


    public function mount(){
        $this->ventas = Venta::all();
        $this->productos = Producto::all();
        $this->tipocambios = Tipo::where('categoria','Cambios')->get(); 
        $this->vendedores = Tipo::where('categoria','Vendedor')->get(); 
        $this->formasdepago = Tipo::where('categoria','MedioPago')->get(); 
        $this->descuentos = Tipo::where('categoria','Descuento')->get();
        $this->tiposdev = Tipo::where('categoria','Tipodedevolucion')->get();
        
    }

    /*public function selectItem($ventaId)
{
    $this->selectedItem = collect($this->ventas)->firstWhere('id', $ventaId);
}*/

    public function submit(){

        DB::beginTransaction();
        try {
            if($this->venta){
            $this->infodeventa = Venta::where('id', $this->venta)->first();
            
            $idProducto = $this->infodeventa->producto;
            
            $this->infoProducto = Producto::find($idProducto);

            if($this->opcseleccionada == 'Devolución'){

            if($this->devolucionsseleccionada == 'Totalidad'){

                $this->montodevtotal = $this->infodeventa->monto;
                $this->infoProducto->cantidad += $this->infodeventa->cantidadprenda;
                $this->infoProducto->save();
                $this->stockdevuelto = $this->infodeventa->cantidadprenda;

                $venta = new Venta();
                $venta->vendedor = $this->vendedor;
                $venta->descripcion = $this->descripcion;
                $venta->transacciontipo = 'Devolución total';
                $venta->fecha_y_hora = $this->fecha_y_hora;
                $venta->codigotransaccion = $this->infodeventa->codigotransaccion;
                $venta->monto =  $this->montodevtotal;
                $venta->cantidadprenda = $this->cantidaddevuelto;
                $venta->operacion = 'SI';
                $venta->producto =  $this->infoProducto->id;

                $venta->save();

            }

            if($this->devolucionsseleccionada == 'Parcial'){

                $this->montodevparcial = $this->cantidaddevuelto * $this->infoProducto->precioFinal;
                $this->totalDev = $this->infodeventa->monto - $this->montodevparcial;
                $this->infoProducto->cantidad += $this->cantidaddevuelto;
                $this->infoProducto->save();
                $this->stockdevuelto = $this->cantidaddevuelto;

                

                $venta = new Venta();
                $venta->vendedor = $this->vendedor;
                $venta->descripcion = $this->descripcion;
                $venta->transacciontipo = 'Devolución Parcial';
                $venta->fecha_y_hora = $this->fecha_y_hora;
                $venta->codigotransaccion = $this->infodeventa->codigotransaccion;
                $venta->monto =  $this->montodevparcial;
                $venta->cantidadprenda = $this->cantidaddevuelto;
                $venta->operacion = 'SI';
                $venta->producto =  $this->infoProducto->id;
               

                $venta->save();

            }
        }
    }

            DB::commit();
           return $this->flash('success', 'Cambio agregado', [
                'position' => 'top',
                'toast' => true,
            ], route('venta.listado'));

        } catch (Throwable $e) {
            dd($e);
            DB::rollBack();
            return $this->alert('error', 'Error', [
                'position' => 'top',
            ]);
        }

    }

    public function render()
    {
        if($this->venta){
            
            $this->infodeventa = Venta::where('id', $this->venta)->first();
            $idProducto = $this->infodeventa->producto;
            
            $this->tipodeTransaccion = $this->infodeventa->operacion;
            
            $this->infoProducto = Producto::find($idProducto);

            $this->devolucionsseleccionada = $this->devseleccionada;

            if($this->devolucionsseleccionada == 'Totalidad'){

                $this->montodevtotal = $this->infodeventa->monto;
    
                $this->infoProducto->cantidad += $this->cantidaddevuelto;

                $this->stockdevuelto = $this->infodeventa->cantidadprenda;

            }

            if($this->devolucionsseleccionada == 'Parcial'){

                $this->montodevparcial = $this->cantidaddevuelto * $this->infoProducto->precioFinal;

                $this->totalDev = $this->infodeventa->monto - $this->montodevparcial;
    
                $this->infoProducto->cantidad += $this->cantidaddevuelto;

                $this->stockdevuelto = $this->cantidaddevuelto;

            }

           

        } else {

            $this->infoProducto = null;
        }
        
    $this->opcionseleccionada = $this->opcseleccionada;
    
    return view('livewire.venta.cambios');
    }
}

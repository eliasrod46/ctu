<?php

namespace App\Http\Livewire\Venta;

use App\Models\Producto;
use App\Models\Tipo;
use App\Models\Venta;
use App\Models\Caja;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Throwable;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Modificar extends Component
{
    use LivewireAlert;

    public Venta $venta;
    public $productos, $vendedores, $formasdepago, $descuentos;
    public $vendedor, $cantidadprenda, $monto, $descripcion, $producto, $formadepago, $preciodeventa,$descuento,$cantidaddescuento;
    public $opcionSeleccionada, $descuentoSeleccionado;
    public $propiedades;

    public function mount(){

        $this->vendedores = Tipo::where('categoria','Vendedor')->get(); 
        $this->formasdepago = Tipo::where('categoria','MedioPago')->get(); 
        $this->descuentos = Tipo::where('categoria','Descuento')->get(); 
        $this->productos = Producto::all();

        $this->vendedor = $this->venta->vendedor;
        $this->cantidadprenda = $this->venta->cantidadprenda;
        $this->descripcion = $this->venta->descripcion;
        $this->opcionSeleccionada = $this->venta->producto;
        $this->formadepago = $this->venta->formadepago;

    }

    public function updatedOpcionSeleccionada()
    {
        // Verifica si la opción seleccionada no es nula antes de acceder a las propiedades
        if ($this->opcionSeleccionada) {
            $this->propiedades = Producto::where('id', $this->opcionSeleccionada)->first();
        } else {
            $this->propiedades = null;
        }
       
    }


    public function submit() {
        
        //$this->validate();
        DB::beginTransaction();
        try {
            //dd($this->descripcion); 
            $montoAnterior = $this->venta->monto;

            $this->venta->vendedor = $this->vendedor;
            $this->venta->cantidadprenda = $this->cantidadprenda;
            $this->venta->descripcion = $this->descripcion;
            $this->venta->producto = $this->opcionSeleccionada;
            $this->venta->formadepago = $this->formadepago; 
           
            $producto = Producto::where('id', $this->opcionSeleccionada)->first();
            

            if($this->descuento === 'SI'){
                $this->venta->descuento = $this->descuento;
                $this->venta->cantidaddescuento = $this->cantidaddescuento;
                //$descuentoaplicado = ($this->cantidaddescuento * $producto->precioFinal)/100;

                $totalventa = $producto->precioFinal * $this->cantidadprenda;
                $descuento = ($totalventa * $this->cantidaddescuento)/100;

                $this->venta->monto = $totalventa - $descuento;

                $caja = Caja::latest()->first();

                $caja->valor -= $montoAnterior;
                
                $caja->valor += $this->venta->monto;
                $caja->save();
            }
            else{
                $this->venta->descuento = $this->descuento;
                $this->venta->monto = ($producto->precioFinal*$this->cantidadprenda);

                $caja = Caja::latest()->first();

                $caja->valor -= $montoAnterior;

                $caja->valor += $this->venta->monto;
                $caja->save();
            }  

            $this->venta->save();

            $producto->cantidad = $producto->cantidad - $this->cantidadprenda;
            $producto->save();
            

            DB::commit();
           return $this->flash('success', 'Venta agregada', [
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
        if ($this->opcionSeleccionada) {
            $this->propiedades = Producto::where('id', $this->opcionSeleccionada)->first();
        } else {
            $this->propiedades = null;
        }

        $this->descuentoSeleccionado = $this->descuento;
        return view('livewire.venta.modificar');
    }
}

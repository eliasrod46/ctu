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
use Livewire\WithFileUploads;

class Create extends Component
{

use LivewireAlert;
use WithFileUploads;

    public $productos, $vendedores, $formasdepago, $operaciones;
    public $vendedor, $cantidadprenda, $monto, $descripcion, $producto, $formadepago, $preciodeventa,$operacion,$cantidaddelooperado, $codigotransaccion;
    public $opcionSeleccionada, $descuentoSeleccionado, $fecha_y_hora;
    public $propiedades;
    public $maximoStock;
    public $comprobantepago;
    public $opcionesSeleccionadas = [];

    protected function rules() {
        return [
                'vendedor' => 'required',
                'cantidadprenda' => 'required|lte:' . $this->maximoStock,
                'opcionSeleccionada' => 'required',
                'formadepago' => 'required',
                'operacion' => 'required',
                'codigotransaccion' => 'required',
                'comprobantepago' => 'required',
                'fecha_y_hora' => 'required',
        ]; 
    }
        
    protected $messages = [
        'cantidadprenda.lte' => 'No hay suficiente stock',
        'cantidadprenda.required' => 'El campo es obligatorio.',
        'vendedor.required' => 'El campo es obligatorio',
        'opcionSeleccionada.required' => 'Debe seleccionar un producto.',
        'vendedor.required' => 'El campo vendedor es obligatorio.',
        'operacion.required' => 'El campo operacion es obligatorio.',
        'formadepago.required' => 'El campo es obligatorio.',
        'codigotransaccion.required' => 'El campo es obligatorio.',
        'comprobantepago.required' => 'El comprobanate de pago es obligatorio',
        'fecha_y_hora.required' => 'El campo fecha y hora es obligatorio'
    ];

    public function mount(){

        $this->vendedores = Tipo::where('categoria','Vendedor')->get(); 
        $this->formasdepago = Tipo::where('categoria','MedioPago')->get(); 
        $this->operaciones = Tipo::where('categoria','Operacion')->get(); 
        $this->productos = Producto::all();

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
        
        $this->validate();
        DB::beginTransaction();
        try {
            //dd($this->descripcion); 
            $venta = new Venta();
            $venta->vendedor = $this->vendedor;
            $venta->cantidadprenda = $this->cantidadprenda;
            $venta->descripcion = $this->descripcion;
            $venta->producto = $this->opcionSeleccionada;
            $venta->formadepago = $this->formadepago; 
            $venta->transacciontipo = 'Venta';
            $venta->codigotransaccion = $this->codigotransaccion;
            $venta->fecha_y_hora = $this->fecha_y_hora;
            
           
            $producto = Producto::where('id', $this->opcionSeleccionada)->first();
            

            if($this->operacion === 'Descuento'){
                $venta->operacion = $this->operacion;
                $venta->cantidaddelooperado = $this->cantidaddelooperado;
                //$descuentoaplicado = ($this->cantidaddescuento * $producto->precioFinal)/100;

                $totalventa = $producto->precioFinal * $this->cantidadprenda;
                $operacion = ($totalventa * $this->cantidaddelooperado)/100;

                $venta->monto = $totalventa - $operacion;

                $caja = Caja::latest()->first();
                $caja->valor += $venta->monto;
                $caja->save();
            }elseif($this->operacion === 'Recargo'){
                $venta->operacion = $this->operacion;
                $venta->cantidaddelooperado = $this->cantidaddelooperado;
                //$descuentoaplicado = ($this->cantidaddescuento * $producto->precioFinal)/100;

                $totalventa = $producto->precioFinal * $this->cantidadprenda;
                $operacion = ($totalventa * $this->cantidaddelooperado)/100;

                $venta->monto = $totalventa + $operacion;

                $caja = Caja::latest()->first();
                $caja->valor += $venta->monto;
                $caja->save();
            }
            else{
                $venta->operacion = $this->operacion;
                $venta->monto = ($producto->precioFinal*$this->cantidadprenda);

                $caja = Caja::latest()->first();
                $caja->valor += $venta->monto;
                $caja->save();
            }  

            if ($this->comprobantepago) {
                // Generar un nombre único para la imagen
                $imagenname = $this->opcionSeleccionada . '.' . $this->comprobantepago->getClientOriginalExtension();
            
                // Guardar la imagen en la carpeta 'archivos/fotos' dentro de 'storage/app/public'
                $ruta = $this->comprobantepago->storeAs('archivos/comprobantes', $imagenname, 'public');
            
                // Almacenar la ruta de la imagen en la base de datos o donde sea necesario
                $venta->comprobantepago = $ruta;
            }
            

            $venta->save();

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
            $this->maximoStock = $this->propiedades->cantidad;
            
            $this->descuentoSeleccionado = $this->operacion;

        } else {
            $this->propiedades = null;
        }

        
        return view('livewire.venta.create');



    }
}

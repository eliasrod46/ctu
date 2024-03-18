<?php

namespace App\Http\Livewire\Compra;

use App\Models\Caja;
use App\Models\Compra;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Throwable;
use Livewire\WithFileUploads;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $formasdepago, $compradores;
    public $descripcion, $compraconcaja, $compraconotro, $comprobantepago, $formadepago, $comprador, $factura, $fecha_y_hora;
    public $formapagoSeleccionado;
    public $maximoMonto;

    protected function rules() {
        return [
            'compraconcaja' => 'numeric|lte:' . $this->maximoMonto,
                'comprador' => 'required|string',
                'descripcion' => 'required|string',
                'compraconotro' => 'max:9999999.99',
                'formadepago' => 'required|string',
        ]; 
    }
        
    protected $messages = [
        'compraconcaja.lte' => 'No tienes suficiente dinero en la caja',
        'comprador.required' => 'El campo comprador es obligatorio.',
        'comprador.string' => 'El campo comprador debe ser una cadena de texto.',
        'descripcion.required' => 'El campo descripción es obligatorio.',
        'descripcion.string' => 'El campo descripción debe ser una cadena de texto.',
        'compraconotro.max' => 'El valor en compraconotro no debe superar :max.',
        'formadepago.required' => 'El campo forma de pago es obligatorio.',
        'formadepago.string' => 'El campo forma de pago debe ser una cadena de texto.',
    ];

    public function mount(){

        $this->compradores = User::all();
        $this->formasdepago = Tipo::where('categoria','FormadePago')->get();
        $caja = Caja::latest()->first();
        $this->maximoMonto = $caja->valor;
    }

    public function save(){

        $this->validate();
        DB::beginTransaction();
        try {


            $compra = new Compra();
            $compra->descripcion = $this->descripcion;
            $compra->compraconcaja = $this->compraconcaja;
            $compra->compraconotro = $this->compraconotro;
            $compra->comprador = $this->comprador;
            $compra->formadepago = $this->formadepago;
            $compra->fecha_y_hora = $this->fecha_y_hora;

            $descripcion = $this->descripcion;

            $fecha = Date::now();

            $año = $fecha->year;
            $mes = $fecha->month;
            $dia = $fecha->day;
            $hora = $fecha->hour;
            $minutos = $fecha->minute;

            $fechaComprobante = $dia.'.'.$mes.'.'.$año;
            $descripcionpago = 'pagorealizado';
            $descripcionfactura = 'facturarecibida';
           
          

            if ($this->comprobantepago) {
                // Generar un nombre único para la imagen
                $imagenname = $fechaComprobante.'.'.$descripcionpago.'.'.$this->comprobantepago->getClientOriginalExtension();
            
                // Guardar la imagen en la carpeta 'archivos/fotos' dentro de 'storage/app/public'
                $ruta = $this->comprobantepago->storeAs('archivos/comprobantes', $imagenname, 'public');
            
                // Almacenar la ruta de la imagen en la base de datos o donde sea necesario
                $compra->comprobantepago = $ruta;
            }

            if ($this->factura) {
                // Generar un nombre único para la imagen
                $imagenname = $fechaComprobante.'.'.$descripcionfactura.'.'.$this->factura->getClientOriginalExtension();
            
                // Guardar la imagen en la carpeta 'archivos/fotos' dentro de 'storage/app/public'
                $ruta = $this->factura->storeAs('archivos/comprobantes', $imagenname, 'public');
            
                // Almacenar la ruta de la imagen en la base de datos o donde sea necesario
                $compra->factura = $ruta;
            }

           

            $compra->save();

            $caja = Caja::latest()->first();
            $caja->valor -= $this->compraconcaja;
            $caja->save();
            

            DB::commit();
            return $this->flash('success', 'Compra agregada', [
                'position' => 'top',
                'toast' => true,
            ], route('compras.listado'));

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
        $this->formapagoSeleccionado = $this->formadepago;
        return view('livewire.compra.create');
    }
}

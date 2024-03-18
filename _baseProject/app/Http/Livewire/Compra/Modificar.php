<?php

namespace App\Http\Livewire\Compra;

use App\Models\Compra;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Throwable;

class Modificar extends Component
{

    use LivewireAlert;
    use WithFileUploads;

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

    public function submit(){

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


    DB::beginTransaction();
    try {
        if ($this->comprobantepago && is_object($this->comprobantepago)) {
            // Generar un nombre único para la imagen
            $imagenname = $fechaComprobante.'.'.$descripcionpago.'.'.$this->comprobantepago->getClientOriginalExtension();
        
            // Guardar la imagen en la carpeta 'archivos/fotos' dentro de 'storage/app/public'
            $ruta = $this->comprobantepago->storeAs('archivos/comprobantes', $imagenname, 'public');
        
            // Almacenar la ruta de la imagen en la base de datos o donde sea necesario
            $this->compra->comprobantepago = $ruta;
        }else {
            // No se ha enviado un nuevo archivo de imagen y no hay una imagen existente
            // Puedes decidir qué hacer en este caso. En este ejemplo, no se realiza ninguna acción especial.
        }

        if ($this->factura && is_object($this->factura)) {
            // Generar un nombre único para la imagen
            $imagenname = $fechaComprobante.'.'.$descripcionfactura.'.'.$this->factura->getClientOriginalExtension();
        
            // Guardar la imagen en la carpeta 'archivos/fotos' dentro de 'storage/app/public'
            $ruta = $this->factura->storeAs('archivos/comprobantes', $imagenname, 'public');
        
            // Almacenar la ruta de la imagen en la base de datos o donde sea necesario
            $this->compra->factura = $ruta;
        }else {
            // No se ha enviado un nuevo archivo de imagen y no hay una imagen existente
            // Puedes decidir qué hacer en este caso. En este ejemplo, no se realiza ninguna acción especial.
        }

        $this->compra->save();
        DB::commit();
            return $this->flash('success', 'Compra Modificada', [
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
        return view('livewire.compra.modificar');
    }
}

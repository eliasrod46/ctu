<?php

namespace App\Http\Livewire\Producto;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Tipo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Throwable;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Modificar extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public Producto $producto;
    public $codigo, $descripcion, $precioCosto, $precioFinal, $imagen, $cantidad, $proveedor,$color, $tipodeprenda, $talle, $marca;
    public $proveedores, $colores, $tiposdeprenda, $talles, $marcas;

    public function mount(){

        $this->codigo = $this->producto->codigo;
        $this->descripcion = $this->producto->descripcion;
        $this->precioCosto = $this->producto->precioCosto;
        $this->precioFinal = $this->producto->precioFinal;
        $this->cantidad = $this->producto->cantidad;
        $this->imagen = $this->producto->imagen;
        $this->proveedor = $this->producto->proveedor;
        $this->color = $this->producto->color;
        $this->tipodeprenda = $this->producto->tipodeprenda;
        $this->talle = $this->producto->talle;
        $this->marca = $this->producto->marca;
    
        
        $this->proveedores = Proveedor::all();
        $this->marcas = Tipo::where('categoria','Marca')->get(); 
        $this->colores = Tipo::where('categoria','Color')->get(); 
        $this->talles = Tipo::where('categoria','Talle')->get(); 
        $this->tiposdeprenda = Tipo::where('categoria','Tipo de prenda')->get(); 
    }

    public function submit() {
        
        //$this->validate();
        DB::beginTransaction();
        try {
            
            $this->producto->codigo = $this->codigo;
            $this->producto->descripcion = $this->descripcion;
            $this->producto->precioCosto = $this->precioCosto;
            $this->producto->precioFinal = $this->precioCosto * 2;
            $this->producto->cantidad = $this->cantidad; 
            $this->producto->proveedor = $this->proveedor;
            $this->producto->color = $this->color;
            $this->producto->tipodeprenda = $this->tipodeprenda;    
            $this->producto->talle = $this->talle;
            $this->producto->marca = $this->marca;    

            $descripcion = $this->descripcion;
            

            if ($this->imagen && is_object($this->imagen)) {
                // Se ha enviado un nuevo archivo de imagen
    
                // Sigue la lógica actual para procesar la nueva imagen
                $imagenname = $this->codigo . '.' . $descripcion . '.' . $this->imagen->getClientOriginalExtension();
                $ruta = $this->imagen->storeAs('archivos/fotos', $imagenname, 'public');
                
                // Almacena la ruta de la imagen en la base de datos o donde sea necesario
                $this->producto->imagen = $ruta;
            } else {
                // No se ha enviado un nuevo archivo de imagen y no hay una imagen existente
                // Puedes decidir qué hacer en este caso. En este ejemplo, no se realiza ninguna acción especial.
            }
            
            // Guardar otros datos del producto
            $this->producto->save();
            

            DB::commit();
            return $this->flash('success', 'Producto Modificado', [
                'position' => 'top',
                'toast' => true,
            ], route('producto.listado'));

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
        return view('livewire.producto.modificar');
    }
}

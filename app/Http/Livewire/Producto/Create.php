<?php

namespace App\Http\Livewire\Producto;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Tipo;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Throwable;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    
    public $codigo, $descripcion, $precioCosto, $precioFinal, $cantidad, $imagen, $proveedor, $color, $tipodeprenda, $talle, $marca;
    public $proveedores, $colores, $tiposdeprenda, $talles, $marcas;
   
    protected function rules() {
        return [
            'codigo' => 'required|string',
            'precioCosto' =>'required|numeric|max:9999999.99',
            'cantidad' =>'required|numeric',
            'proveedor' => 'required',
            'marca' => 'required',
            'talle' => 'required',
            'tipodeprenda' => 'required',
            'color' => 'required',
        ];
    }
            
        protected $messages = [
            'codigo.required' => 'El campo es obligatorio',
            'codigo.string' => 'El campo debe ser una cadena de caracteres',
            'precioCosto.required' => 'El campo es obligatorio',
            'cantidad.required' => 'El campo es obligatorio.',
            'proveedor.required' => 'El campo es obligatorio.',
            'marca.required' => 'El campo es obligatorio.',
            'talle.required' => 'El campo es obligatorio.',
            'tipodeprenda.required' => 'El campo es obligatorio.',
            'color.required' => 'El campo es obligatorio.',
        ];

    public function mount(){
        $this->proveedores = Proveedor::all();
        $this->marcas = Tipo::where('categoria','Marca')->get(); 
        $this->colores = Tipo::where('categoria','Color')->get(); 
        $this->talles = Tipo::where('categoria','Talle')->get(); 
        $this->tiposdeprenda = Tipo::where('categoria','Tipo de prenda')->get(); 
    }

    public function submit() {
        
        $this->validate();
        DB::beginTransaction();
        try {
            //dd($this->descripcion); 
            $producto = new Producto();
            $producto->codigo = $this->codigo;
            $producto->descripcion = $this->descripcion;
            $producto->precioCosto = $this->precioCosto;
            $producto->precioFinal = $this->precioCosto * 2;
            $producto->cantidad = $this->cantidad;
            $producto->proveedor = $this->proveedor;
            $producto->color = $this->color;
            $producto->tipodeprenda = $this->tipodeprenda;    
            $producto->talle = $this->talle;
            $producto->marca = $this->marca;

            $descripcion = $this->descripcion;

            if ($this->imagen) {
                // Generar un nombre único para la imagen
                $imagenname = $this->codigo . '.' . $descripcion . '.' . $this->imagen->getClientOriginalExtension();
            
                // Guardar la imagen en la carpeta 'archivos/fotos' dentro de 'storage/app/public'
                $ruta = $this->imagen->storeAs('archivos/fotos', $imagenname, 'public');
            
                // Almacenar la ruta de la imagen en la base de datos o donde sea necesario
                $producto->imagen = $ruta;
            }
            
            // Guardar otros datos del producto
            $producto->save();
            

            DB::commit();
            return $this->flash('success', 'Producto agregado', [
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
        return view('livewire.producto.create');
    }
}

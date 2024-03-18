<?php

namespace App\Http\Livewire\Producto;

use App\Models\Tipo;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Throwable;
use Illuminate\Support\Facades\DB;

class Descripcion extends Component
{
    use LivewireAlert;

    public $descripciones, $descipcionSeleccionada, $descripcion, $marca, $talle, $tipodeprenda, $color;
    public $marcas, $talles, $tiposdeprenda, $colores, $marcaslista, $talleslista, $tiposdeprendalista, $coloreslista;

    public function mount(){
        $this->descripciones = Tipo::where('categoria','Descripcion')->get(); 
    }

    public function submit(){
        DB::beginTransaction();
        try {
            $tipo = new Tipo();

            if($this->descipcionSeleccionada === 'Marca'){
                $tipo->nombre = $this->marca;
                $tipo->sigla = $this->marca;
                $tipo->categoria = 'Marca';
            }
            elseif($this->descipcionSeleccionada === 'Talle'){
                $tipo->nombre = $this->talle;
                $tipo->sigla = $this->talle;
                $tipo->categoria = 'Talle';

            }elseif($this->descipcionSeleccionada === 'Tipo de prenda'){
                $tipo->nombre = $this->tipodeprenda;
                $tipo->sigla = $this->tipodeprenda;
                $tipo->categoria = 'Tipo de prenda';
            }else{
                $tipo->nombre = $this->color;
                $tipo->sigla = $this->color;
                $tipo->categoria = 'Color'; 
            }
            $tipo->save();
            DB::commit();
            return $this->flash('success', 'Descripción agregada', [
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
        $this->marcaslista = Tipo::where('categoria','Marca')->get();
        $this->tiposdeprendalista = Tipo::where('categoria','Tipo de prenda')->get();
        $this->coloreslista = Tipo::where('categoria','Color')->get();
        $this->talleslista = Tipo::where('categoria','Talle')->get();
        
        $this->descipcionSeleccionada = $this->descripcion;
        return view('livewire.producto.descripcion');
    }
}

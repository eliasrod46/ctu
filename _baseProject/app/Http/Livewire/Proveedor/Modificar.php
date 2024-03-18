<?php

namespace App\Http\Livewire\Proveedor;

use App\Models\Proveedor;
use App\Models\Tipo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Throwable;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Modificar extends Component
{
    use LivewireAlert;
    
    public $nombre, $cbu, $telefono, $alias, $provincia, $email;
    public $provincias;
    public Proveedor $proveedor;

    public function mount(){
        $this->provincias = Tipo::where('categoria','Provincia')->get();

        $this->nombre = $this->proveedor->nombre;
        $this->cbu = $this->proveedor->cbu;
        $this->telefono =  $this->proveedor->telefono;
        $this->alias = $this->proveedor->alias;
        $this->provincia = $this->proveedor->provincia;
        $this->email = $this->proveedor->email;     
        
    }

    public function submit() {
        
        //$this->validate();
        DB::beginTransaction();
        try {
            //dd($this->descripcion); 
            $this->proveedor->nombre = $this->nombre;
            $this->proveedor->cbu = $this->cbu;
            $this->proveedor->telefono = $this->telefono;
            $this->proveedor->alias = $this->alias;
            $this->proveedor->provincia = $this->provincia;
            $this->proveedor->email = $this->email;     

            $this->proveedor->save();
            

            DB::commit();
           return $this->flash('success', 'Proveedor modificado', [
                'position' => 'top',
                'toast' => true,
            ], route('proveedor.listado'));

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
        return view('livewire.proveedor.modificar');
    }
}

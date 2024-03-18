<?php

namespace App\Http\Livewire\Proveedor;

use App\Models\Proveedor;
use App\Models\Tipo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Throwable;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use LivewireAlert;

    public $nombre, $cbu, $telefono, $alias, $provincia, $email;
    public $provincias;

    protected function rules() {
        return [
                'nombre' => 'required',
                'cbu' => 'required|numeric',
                'telefono' => 'required',
                'alias' => 'required',
                'provincia' => 'required',
                'email' => 'required|string|email|max:255',
        ]; 
    }
        
    protected $messages = [
        'nombre.required' => 'El campo es obligatorio.',
        'cbu.required' => 'El campo es obligatorio',
        'cbu.numeric' => 'El campo debe ser un valor numérico',
        'telefono.required' => 'El campo es obligatorio',
        'alias.required' => 'El campo es obligatorio.',
        'provincia.required' => 'El campo es obligatorio.',
        'formadepago.required' => 'El campo es obligatorio.',
        'email.required' => 'El campo es obligatorio.',
        'email.string' => 'El campo debe contener una cadena de caracteres',
        'email.email' => 'El campo debe tener formato de email',
        
    ];

    public function mount(){
        $this->provincias = Tipo::where('categoria','Provincia')->get();
        
        
    }

    public function submit() {
        
        $this->validate();
        DB::beginTransaction();
        try {
            //dd($this->descripcion); 
            $proveedor = new Proveedor();
            $proveedor->nombre = $this->nombre;
            $proveedor->cbu = $this->cbu;
            $proveedor->telefono = $this->telefono;
            $proveedor->alias = $this->alias;
            $proveedor->provincia = $this->provincia;
            $proveedor->email = $this->email;     

            $proveedor->save();
            

            DB::commit();
            return $this->flash('success', 'Proveedor agregado', [
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
        return view('livewire.proveedor.create');
    }
}

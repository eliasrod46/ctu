<?php

namespace App\Http\Livewire\Venta;

use App\Models\Caja;
use App\Models\Venta;
use Livewire\Component;

class Detallecaja extends Component
{
    public $montoTotalventas =0;

    public function mount(){
        

        $caja = Caja::latest()->first();
        $this->montoTotalventas = $caja->valor;
    }
    
    public function totalVentas()
    {

    }

    public function render()
    {
        return view('livewire.venta.detallecaja');
    }
}

<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Laravel\Fortify\Rules\Password;
use Livewire\Component;
use Throwable;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    use LivewireAlert;

    public $nombre, $apellido, $email, $telefono, $password;
    
    protected function rules() {
        return [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'telefono' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'string', new Password],
        ];
    }

    protected $validationAttributes = [
        'email' => 'correo electrónico',
        'password' => 'contraseña',
        'nombre' => 'nombre de usuario',
    ];

    public function submit() {
        $this->validate($this->rules());
        DB::beginTransaction();

        try {
        $user = new User();
        $user->nombre     = $this->nombre;
        $user->apellido    = $this->apellido;
        $user->telefono    = $this->telefono;
        $user->email        = $this->email;
        $user->password     = Hash::make($this->password);
        $user->save();

        DB::commit();

       return $this->flash('success', 'Usuario Creado', [
            'position' => 'top',
            'toast' => true,
        ], route('user.listado'));

    }catch (Throwable $e) {
        DB::rollBack();
        dd($e);
        return $this->alert('error', 'Error', [
            'position' => 'top',
        ]);
    }
}

    public function render()
    {
        return view('livewire.user.create');
    }
}

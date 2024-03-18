<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'apellido' => 'Morales',
                'nombre' => 'Sergio',
                'email' => 'checho040890@gmail.com',
                'password' => Hash::make('ctu05051905'),
                'telefono' => '2664920741',
            ],
        ];

        DB::table('users')->insert($users);
    }
}

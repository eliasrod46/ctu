<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'lastname' => 'Proveedor',
                'name' => 'Uno',
                'dni' => 26492071,
                'state' => 'San Juan',
                'cbu' => '2634649245321458789654',
                'alias' => 'palabra1.palabra2.palabra3',
                'phone' => 2641234567,
                'email' => 'proveedor@uno.com',
            ],
            [
                'lastname' => 'Proveedor',
                'name' => 'Dos',
                'dni' => 26492071,
                'state' => 'Mendoza',
                'cbu' => '26346492845324587896541',
                'alias' => 'palabra4.palabra5.palabra6',
                'phone' => 2641234567,
                'email' => 'proveedor@dos.com',
            ],
            [
                'lastname' => 'Proveedor',
                'name' => 'Tres',
                'dni' => 26492071,
                'state' => 'Chubut',
                'cbu' => '2634649245321458789654',
                'alias' => 'palabra7.palabra8.palabra9',
                'phone' => 2641234567,
                'email' => 'proveedor@tres.com',
            ],
        ];

        DB::table('suppliers')->insert($suppliers);
    }
}

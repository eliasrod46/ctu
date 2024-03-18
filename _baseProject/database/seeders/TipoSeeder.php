<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            [
                'nombre' => 'Buenos Aires',
                'sigla' => 'BA',
                'categoria' => 'Provincia'
            ],
            [
                'nombre' => 'Catamarca',
                'sigla' => 'CAT',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Chaco',
                'sigla' => 'CHA',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Chubut',
                'sigla' => 'CHU',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Córdoba',
                'sigla' => 'CORD',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Corrientes',
                'sigla' => 'CORR',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Entre Ríos',
                'sigla' => 'ER',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Formosa',
                'sigla' => 'FOR',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Jujuy',
                'sigla' => 'JUJ',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'La Pampa',
                'sigla' => 'LP',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'La Rioja',
                'sigla' => 'LR',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Mendoza',
                'sigla' => 'MEN',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Misiones',
                'sigla' => 'MIS',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Neuquén',
                'sigla' => 'NEU',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Río Negro',
                'sigla' => 'RN',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Salta',
                'sigla' => 'SAL',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'San Juan',
                'sigla' => 'SJ',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'San Luis',
                'sigla' => 'SL',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Santa Cruz',
                'sigla' => 'SC',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Santa Fe',
                'sigla' => 'SF',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Santiago del Estero',
                'sigla' => 'SDE',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Tierra del Fuego',
                'sigla' => 'TF',
                'categoria' => 'Provincia'
            ],[
                'nombre' => 'Erica',
                'sigla' => 'E',
                'categoria' => 'Vendedor'
            ],[
                'nombre' => 'Roberto',
                'sigla' => 'R',
                'categoria' =>'Vendedor'
            ],[
                'nombre' => 'Sergio',
                'sigla' => 'S',
                'categoria' => 'Vendedor'
            ],[
                'nombre' => 'Terceros',
                'sigla' => 'T',
                'categoria' => 'Vendedor'
            ],
            [
                'nombre' => 'Contado',
                'sigla' => 'TF',
                'categoria' => 'MedioPago'
            ],
            [
                'nombre' => 'Transferencia',
                'sigla' => 'TU',
                'categoria' => 'MedioPago'
            ],
            [
                'nombre' => 'Débito',
                'sigla' => 'DE',
                'categoria' => 'MedioPago'
            ],
            [
                'nombre' => 'Descuento',
                'sigla' => 'desc',
                'categoria' => 'Operacion'
            ],
            [
                'nombre' => 'Recargo',
                'sigla' => 'rec',
                'categoria' => 'Operacion'
            ],
            [
                'nombre' => 'NO',
                'sigla' => 'NO',
                'categoria' => 'Operacion'
            ],
            [
                'nombre' => 'Dinero de la caja',
                'sigla' => 'c',
                'categoria' => 'FormadePago'
            ],
            [
                'nombre' => 'Dinero particular',
                'sigla' => 'p',
                'categoria' => 'FormadePago'
            ],
            [
                'nombre' => 'Dinero de caja y particular',
                'sigla' => 'c',
                'categoria' => 'FormadePago'
            ],
            [
                'nombre' => 'Devolución',
                'sigla' => 'dev',
                'categoria' => 'Cambios'
            ],
            [
                'nombre' => 'Cambio por otro producto',
                'sigla' => 'cpop',
                'categoria' => 'Cambios'
            ],
            [
                'nombre' => 'Marca',
                'sigla' => 'marca',
                'categoria' => 'Descripcion'
            ],
            [
                'nombre' => 'Talle',
                'sigla' => 'talle',
                'categoria' => 'Descripcion'
            ],
            [
                'nombre' => 'Tipo de prenda',
                'sigla' => 'tipodeprenda',
                'categoria' => 'Descripcion'
            ],
            [
                'nombre' => 'Color',
                'sigla' => 'color',
                'categoria' => 'Descripcion'
            ],
            [
                'nombre' => 'Totalidad',
                'sigla' => 'totalidad',
                'categoria' => 'Tipodedevolucion'
            ],
            [
                'nombre' => 'Parcial',
                'sigla' => 'parcial',
                'categoria' => 'Tipodedevolucion'
            ]
        ];

        DB::table('tipos')->insert($tipos);
    }
}

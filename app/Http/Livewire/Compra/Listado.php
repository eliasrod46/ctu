<?php

namespace App\Http\Livewire\Compra;

use Livewire\Component;
use App\Models\Compra;

use Illuminate\Contracts\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

class Listado extends PowerGridComponent
{
    
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    /*public function setUp(): array
    {

       
    }*/
    public function setUp(): array
    {

        return [
            Exportable::make('Compras -'.time())
                ->striped()
                ->type(Exportable::TYPE_XLS),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
            
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\Institucion>
    */
    public function datasource(): Builder
    {
        return Compra::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */
    public function relationSearch(): array
    {
        return [
            'proveedor' => [ // relationship on dishes model
                'nombre', // column enabled to search
            ],
            
        ];
    }

    
    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    /*public function relationSearch(): array
{
    return [
      ];
}*/

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
{
    return PowerGrid::eloquent()
        ->addColumn('id')
        ->addColumn('descripcion')
        ->addColumn('formadepago')
        ->addColumn('compraconcaja')
        ->addColumn('compraconotro')
        ->addColumn('comprador')
        ->addColumn('created_at');
        
}

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->hidden(),

                Column::make('Descripción', 'descripcion')
                ->searchable()
                ->sortable(),
            
            Column::make('Forma de pago usado', 'formadepago')
                ->searchable()
                ->sortable(),

            Column::make('Compra desde caja', 'compraconcaja')
                ->searchable()
                ->sortable(),

            Column::make('Compra particular', 'compraconotro')
                ->searchable()
                ->sortable(),

            Column::make('Comprador', 'comprador')
                ->searchable()
                ->sortable(),
                
            Column::make('Fecha de compra', 'created_at')
                ->searchable()
                ->sortable(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Docente Action Buttons.
     *
     * @return array<int, Button>
     */

     
    


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Docente Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($docente) => $docente->id === 1)
                ->hide(),
        ];
    }
    */
    public function actions(): array
     {
        return [

            Button::make('ver', '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 display: inline;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>')
                ->class('cursor-pointer text-white rounded text-sm display: inline;')
                ->route('compras.detalle', ['id' => 'id'])
                ->target('_self'),

                Button::make('modificar', '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500 display: inline;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>')
               ->class('cursor-pointer text-white  rounded text-sm display: inline;')
               ->route('compras.modificar', ['id' => 'id'])
               ->target('_self'),

             
         ];
     }
}


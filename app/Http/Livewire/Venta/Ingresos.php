<?php

namespace App\Http\Livewire\Venta;

use App\Models\Venta;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

class Ingresos extends PowerGridComponent
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
            Exportable::make('Ventas -'.time())
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
        return Venta::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */
    

    
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
        ->addColumn('transacciontipo')
        ->addColumn('producto')
        ->addColumn('descripcion')
        ->addColumn('monto')
        ->addColumn('formadepago')
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

                Column::make('Código de transacción', 'codigotransaccion')
                ->searchable()
                ->sortable(),

                Column::make('Código de la prenda', 'producto')
                ->searchable()
                ->sortable(),
            
            Column::make('Descripción', 'descripcion')
                ->searchable()
                ->sortable(),

            Column::make('Monto total', 'monto')
                ->searchable()
                ->sortable(),

            Column::make('Forma de pago', 'formadepago')
                ->searchable()
                ->sortable(),
                
          
            Column::make('Hora/Fecha de la venta', 'created_at')
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

     public function actions(): array
     {
        return [

            ];
     }
    


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
}

<?php

namespace App\Http\Livewire;

use App\Models\File;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AllFileRegisterTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
      //  $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
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
    * @return Builder<\App\Models\File>
    */
    public function datasource(): Builder
    {
        // Return files which are not returned
        return File::query();
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
    public function relationSearch(): array
    {
        return [];
    }

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
            ->addColumn('file_name')

            ->addColumn('received_from')
            ->addColumn('receive_date_formatted', fn (File $model) => Carbon::parse($model->receive_date)->format('d/m/Y'))
            ->addColumn('returned_to')
            ->addColumn('days_in_office', fn (File $model) => Carbon::parse($model->receive_date)->diffInDays(Carbon::now()))
            ->addColumn('return_date_formatted', fn (File $model) => Carbon::parse($model->return_date)->format('d/m/Y'))
            ->addColumn('remarks');
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
            

            Column::make('FILE NAME', 'file_name')
                ->sortable()
                ->searchable(),

            Column::make('RECEIVED FROM', 'received_from')
                ->sortable()
                ->searchable(),

            Column::make('RECEIVE DATE', 'receive_date_formatted', 'receive_date')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

            Column::make('RETURNED TO', 'returned_to')
                ->sortable()
                ->searchable(),

            Column::make('RETURN DATE', 'return_date_formatted', 'return_date')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),
            
            Column::make('DAYS IN OFFICE', 'days_in_office'),
            
            Column::make('Remarks', 'remarks')
                ->searchable()
                ->sortable(),
        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid File Action Buttons.
     *
     * @return array<int, Button>
     */

 
    // public function actions(): array
    // {
    //    return [
    //        Button::make('edit', 'Dispatch')
    //            ->class('bg-blue-700 font-bold cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
    //            ->route('file.edit', ['file' => 'id'])
    //            ->target(''),

    //        Button::make('destroy', 'Delete')
    //            ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
    //            ->route('file.destroy', ['file' => 'id'])
    //            ->method('delete')
    //     ];
    // }
    

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid File Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($file) => $file->id === 1)
                ->hide(),
        ];
    }
    */
}

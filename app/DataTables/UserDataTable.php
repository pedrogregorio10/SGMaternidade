<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        //data de acesso ao sistema
        ->addColumn('acesso', function($query){
                //return $query->acesso->diffForHumans();
        })
        ->addColumn('editar', function($query){

            $show = '<a class="btn btn-info" href="'.route('user.show',$query->id).'" style="margin-bottom:5px"><i class=" far fa-eye"></i></a>';

            $edit = '<a class="btn btn-primary" href="'.route('user.edit',$query->id).'" style="margin-bottom:5px"><i class="far fa-edit"></i></a>';

            $delete = '<a href="'.route('user.destroy',$query->id).'" class="btn btn-danger delete-item"><i class="far fa-trash-alt"></i></a>';
            return $show.$edit.$delete;
        })
        ->rawColumns(['editar'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    // public function query(User $model): QueryBuilder
    // {
    //     return $model->newQuery();
    // }

    public function query(User $model): QueryBuilder
{
    return $model->newQuery()->where('tipo','!=','med');
}

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->language([
                        'url' => ''.asset('portugues/pt-BR.json').''
                    ])
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
           Column::make('name'),
            Column::make('tipo')->title('Função'),
            Column::make('email'),
            Column::make('telefone'),
            Column::make('acesso'),
            Column::computed('editar')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}

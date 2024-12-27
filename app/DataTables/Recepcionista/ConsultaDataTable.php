<?php

namespace App\DataTables\Recepcionista;

use App\Models\User;
use App\Models\Consulta;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\Escala;
use Carbon\Carbon;

class ConsultaDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('nome', function ($query) {
            return $query->paciente->nome?? 'n/a';
        })
        ->addColumn('bi', function ($query) {
            return $query->paciente->n_bi?? 'n/a';
        })
        ->addColumn('data', function ($query) {
            return Carbon::parse($query->escala->data)->format('d/m/y')?? 'n/a';
        })
        ->addColumn('motivo', function ($query) {
            return $query->observacoes;
        })
        ->addColumn('editar', function($query){
            $show = '<a class="btn btn-info" href="'.route('consulta.show',$query->id).'" style="margin-bottom:5px"><i class=" far fa-eye"></i></a>';

            $edit = '<a class="btn btn-primary" href="'.route('consulta.edit',$query->id).'" style="margin-bottom:5px"><i class="far fa-edit"></i></a>';

            $delete = '<a href="'.route('consulta.destroy',$query->id).'" class="btn btn-danger delete-item"><i class="far fa-trash-alt"></i></a>';
            return $show.$edit.$delete;
        })
        ->rawColumns(['editar','nome','data','motivo','bi'])
        ->setRowId('id');
    }

    public function query(Consulta $model): QueryBuilder
{
    return $model->newQuery();
}

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('consultas-table')
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
            Column::make('nome')->title('Nome do paciente'),
            Column::make('bi')->title('Nº BI'),
            Column::make('data'),
            Column::make('motivo')->title('Motivo da consulta'),
            Column::make('status'),
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
        return 'Consulta_' . date('YmdHis');
    }
}

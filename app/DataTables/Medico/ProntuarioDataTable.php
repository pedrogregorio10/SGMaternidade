<?php

namespace App\DataTables\Medico;

use App\Models\User;
use App\Models\Prontuario;
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

class ProntuarioDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        //Nome do paciente id_paciente
        ->addColumn('nome', function ($query) {
            return $query->consulta->paciente->nome?? 'n/a';
        })
        //data da consulta
        ->addColumn('data', function ($query) {
            return $query->consulta->escala->data?? 'n/a';
        })
        //Status da consulta
        ->addColumn('status', function ($query) {
            return $query->consulta->status;
        })
        ->addColumn('editar', function($query){
            $show = '<a class="btn btn-info" href="'.route('consulta.show',$query->consulta->id).'" style="margin-bottom:5px"><i class=" far fa-eye"></i></a>';

            $edit = '<a class="btn btn-primary" href="'.route('prontuario.edit',$query->id).'" style="margin-bottom:5px"><i class="far fa-edit"></i></a>';

            $delete = '<a href="'.route('prontuario.destroy',$query->id).'" class="btn btn-danger delete-item"><i class="far fa-trash-alt"></i></a>';
            return $show.$edit.$delete;
        })
        ->rawColumns(['editar','nome','data','motivo'])
        ->setRowId('id');
    }

    public function query(Prontuario $model): QueryBuilder
{
    return $model->newQuery()
        ->whereHas('consulta', function ($query) {
            $query->where('id_medico', auth()->id());
        })
        ->with('consulta');
}

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('prontuarios-table')
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
            Column::make('data')->title('Data da Consulta'),
            Column::make('diagnostico')->title('Diagnóstico'),
            Column::make('tratamento')->title('Tratamento'),
            Column::make('exames_solicitados')->title('Exames Solicitados'),
            Column::make('prescricao')->title('Prescrição Médica'),
            Column::make('status')->title('Status da Consulta'),
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
        return 'prontuario_' . date('YmdHis');
    }
}

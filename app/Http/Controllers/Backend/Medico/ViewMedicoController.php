<?php

namespace App\Http\Controllers\Backend\Medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Medico\EscalaDataTable;
use App\DataTables\Medico\AgendamentoDataTable;
use App\Models\User;
use App\Models\Agendamento;
use App\Models\Escala;

class ViewMedicoController extends Controller
{
    //Painel de controle do medico
    public function dashboard() {
        return view('medico/dashboard');
    }

    //lista de escala de trabalho do medico logado
    public function escala(EscalaDataTable $dataTable) {

        return $dataTable->render('medico/escala/index');

    }

    //Lista de consultas agendadas
    public function agendamento(AgendamentoDataTable $dataTable) {
        return $dataTable->render('medico/agendamento/index');
    }

    //Listar todos os medicos disponiveis para consulta
    public function listar()
    {

            return view('medico/agendamento/listar');

    }
    //Agendar consulta
    public function agendar($id)
    {
            $user = User::where('id', $id)
                          ->where('tipo', 'med')
                          ->whereHas('escala', function ($query) {
                              $query->where('quantidade', '>', 0);
                          })
                          ->with('escala')
                          ->first();
            return view('medico/agendamento/create', compact('user'));
    }

    public function mostrar($id)
    {
        // Buscar o agendamento
        $agendamento = Agendamento::find($id);

        return view('medico/agendamento/show', compact('agendamento'));
    }

    public function editar($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $escalas = Escala::where('id_medico',$agendamento->id_medico)->get();

        return view('medico/agendamento/edit', compact('agendamento','escalas'));

    }

}

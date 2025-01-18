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
    public function listar(Request $request)
    {
            $users = User::with('escala')
            ->where('tipo', 'med')
            ->whereHas('escala',function ($query) {
                $query->where('quantidade', '>', 0);
            });
            if ($request->filled('name')) {
              $users->where('name', 'like', '%' . $request->name . '%');
            }
            if ($request->filled('especialidade')) {
                $users = $users->whereHas('medico', function ($query) use ($request) {
                    $query->where('especialidade', 'like', '%' . $request->especialidade . '%');
                })->with('medico');
            }
            if ($request->filled('data')) {
                $users =  $users->whereHas('escala', function ($query) use ($request) {
                    $query->where('data', $request->data);
                })->with('escala');
            }
            $users = $users->get();
            if($users->isEmpty()){
                session()->flash('erro', 'Nenhum médico disponível para agendamento no momento.');
            }
            return view('medico/agendamento/listar', compact('users'));
    }


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

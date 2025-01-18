<?php

namespace App\Http\Controllers\Backend\Recepcionista;

use App\Models\Paciente;
use App\Models\User;
use App\Models\Agendamento;
use App\Models\Escala;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Recepcionista\PacienteDataTable;
use App\DataTables\Recepcionista\AgendamentoDataTable;
use App\DataTables\Recepcionista\EscalaDataTable;

use App\DataTables\Recepcionista\ConsultaDataTable;

class RecepcionistaController extends Controller
{
    public function dashboard() {
        return view('recepcionista/dashboard');
    }

    public function paciente(PacienteDataTable $dataTable) {
        return $dataTable->render('recepcionista/paciente/index');
    }

    public function agendamento(AgendamentoDataTable $dataTable) {
        return $dataTable->render('recepcionista/agendamento/index');
    }

    public function escala(EscalaDataTable $dataTable) {
        return $dataTable->render('recepcionista/escala/index');
    }

    public function consulta(ConsultaDataTable $dataTable) {
        return $dataTable->render('recepcionista/consulta/index');
    }

    public function listarAgendaDisponivel(Request $request)
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
        return view('recepcionista/agendamento/listar', compact('users'));
    }


    public function agendarConsulta($id)
    {
            $user = User::where('id', $id)
                          ->where('tipo', 'med')
                          ->whereHas('escala', function ($query) {
                              $query->where('quantidade', '>', 0);
                          })
                          ->with('escala')
                          ->first();
            return view('recepcionista/agendamento/create', compact('user'));
    }

    public function paciente_create()
    {
        return view('recepcionista/paciente/create');
    }

    public function paciente_show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('recepcionista/paciente/show', compact('paciente'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function paciente_edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('recepcionista/paciente/edit', compact('paciente'));
    }

    public function agendamentoShow($id)
{
    // Buscar o agendamento
    $agendamento = Agendamento::find($id);

    return view('recepcionista/agendamento/show', compact('agendamento'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function agendamentoEdit($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        //dd($agendamento->id_medico);
        $escalas = Escala::where('id_medico',$agendamento->id_medico)->get();
        return view('recepcionista/agendamento/edit', compact('agendamento','escalas'));

    }

}

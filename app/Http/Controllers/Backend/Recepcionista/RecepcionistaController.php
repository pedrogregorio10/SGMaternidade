<?php

namespace App\Http\Controllers\Backend\Recepcionista;

use App\Models\Paciente;
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

    public function listarAgendaDisponivel() {
        return view('recepcionista/agendamento/listar');
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

    public function create()
    {
        return view('recepcionista/paciente/create');
    }

    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('recepcionista/paciente/show', compact('paciente'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('recepcionista/paciente/edit', compact('paciente'));
    }

}

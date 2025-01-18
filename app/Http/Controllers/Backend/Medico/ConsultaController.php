<?php

namespace App\Http\Controllers\Backend\Medico;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use App\Models\Escala;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agendamento;
use App\Models\Paciente;
use App\Models\Prontuario;
use App\DataTables\Medico\ConsultaDataTable;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ConsultaDataTable $dataTable)
    {
        return $dataTable->render('medico/consulta/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }


    public function confirmarConsulta($id)
    {
        // Busca o agendamento
        $agendamento = Agendamento::findOrFail($id);

        // Verifica se o paciente já existe pelo número do BI
        $paciente = Paciente::where('n_bi', $agendamento->n_bi)->first();

        // Se o paciente não existe, cria um novo
        if (!$paciente) {
            $paciente = Paciente::create([
                'nome' => $agendamento->nome,
                'data_nascimento' => $agendamento->data_nascimento,
                'n_bi' => $agendamento->n_bi,
                'telefone' => $agendamento->telefone,
                'provincia' => $agendamento->provincia,
                'municipio' => $agendamento->municipio,
                'estado' => $agendamento->estado,
                'estado' => $agendamento->estado,
            ]);
        }

        //Evitar duplicar cadastro de consulta
        //Chave id_paciente, id_medico //Sugestao futura: incluir a id_escala pra completar a chave super, primaria
        $consulta =
        Consulta::where('id_paciente',$paciente->id)
        ->where('id_medico', $agendamento->id_medico)
        ->where('id_escala',$agendamento->id_escala)->first();

        if ($consulta) {
            toastr()->warning('Essa consulta já foi marcada anteriormente.');
            return redirect()->back();
        }

        $consulta = new Consulta();
        $consulta->id_paciente = $paciente->id;// Relaciona com o paciente
        $consulta->id_medico = $agendamento->id_medico;
        $consulta->id_escala = $agendamento->id_escala;
        $consulta->tipo = $agendamento->tipo;
        $consulta->status = 'pendente';
        $consulta->motivo = $agendamento->motivo;
        $consulta->save();

        toastr()->success('Consulta Marcada com sucesso!');
        return redirect()->back();

    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $consulta = Consulta::findOrFail($id);
        $prontuario = Prontuario::where('id_consulta',$consulta->id)->first();
        return view('medico/consulta/show', compact('consulta','prontuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $consulta = Consulta::findOrFail($id);
        return view('medico/consulta/edit', compact('consulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->update($request->all());

        toastr()->success('Observacao adicionada com sucesso');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consulta $consulta)
    {
        //
    }
}

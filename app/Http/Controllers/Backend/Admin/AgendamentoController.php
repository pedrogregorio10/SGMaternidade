<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Models\Escala;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Agendamento;
use Illuminate\Support\Facades\Validator;
use App\DataTables\AgendamentoDataTable;
use App\Http\Controllers\Controller;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AgendamentoDataTable $dataTable)
    {
        return $dataTable->render('admin/agendamento/index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }
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
        return view('admin/agendamento/listar', compact('users'));
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
            return view('admin/agendamento/create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'data_nascimento' => 'required|date',
        'n_bi' => 'required|string|max:14|regex:/^[0-9]{9}[A-Za-z]{2}[0-9]{3}$/',
        'provincia' => 'required|string|max:255',
        'municipio' => 'required|string|max:255',
        'telefone' => 'required|string|max:15|regex:/^\+244[0-9]{9}$/',
        'estado' => 'required|in:solteiro/a,casado/a',
        'tipo' => 'required|in:pre,pos',
        'id_medico' => 'required|exists:users,id',
        'id_escala' => 'required|exists:escalas,id',
        'motivo' => 'nullable|string|max:500',
    ]);


    $medico = User::where('id', $request->id_medico)->where('tipo', 'med')->first();

    $horario = Escala::find($request->id_escala);
    if (!$horario || $horario->quantidade <= 0) {
        toastr()->success('Data indisponivel!');
        return redirect()->back();
    }

    $verificaAgendamento =
    Agendamento::where('id_medico',$request->id_medico)
    ->where('id_escala', $request->id_escala)
    ->where('n_bi', $request->n_bi)
    ->first();

    if(!$verificaAgendamento){
        $agendamento = Agendamento::create($request->all());
    }else{
        toastr()->warning('Este agendamento ja se encontra arquivado, aguarde a confirmacao');
        return redirect()->back();
    }
    // Se o agendamento for confirmado, decrementar a quantidade de pacientes
    if (1 == 1) {
        $horario->quantidade -= 1;
        $horario->save();
    }
    toastr()->success('Agendado com sucesso!');
    return redirect()->back();
}


    /**
     * Display the specified resource.
     */
    public function show($id)
{
    // Buscar o agendamento
    $agendamento = Agendamento::find($id);

    return view('admin/agendamento/show', compact('agendamento'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agendamento $agendamento)
    {
        $escalas = Escala::where('id_medico',$agendamento->id_medico)->get();
        return view('admin/agendamento/edit', compact('agendamento','escalas'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agendamento $agendamento)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'n_bi' => 'required|string|max:14|regex:/^[0-9]{9}[A-Za-z]{2}[0-9]{3}$/',
            'provincia' => 'required|string|max:255',
            'municipio' => 'required|string|max:255',
            'telefone' => 'required|string|max:15|regex:/^\+244[0-9]{9}$/',
            'estado' => 'required|in:solteiro/a,casado/a',
            'tipo' => 'required|in:pre,pos',
            'id_medico' => 'required|exists:users,id',
            'id_escala' => 'required|exists:escalas,id',
            'motivo' => 'nullable|string|max:500',
        ]);

        // Verificar se o id_medico é válido
        $medico = User::where('id', $request->id_medico)->where('tipo', 'med')->first();
        if (!$medico) {
            toastr()->error('Médico inválido!');
            return redirect()->back();
        }

        // Obter o horário atual associado ao agendamento
        $horarioAtual = Escala::find($agendamento->id_escala);

        // Verificar se o novo horário tem vagas disponíveis
        $novoHorario = Escala::find($request->id_escala);
        if (!$novoHorario || ($novoHorario->quantidade <= 0 && $novoHorario->id !== $horarioAtual->id)) {
            toastr()->error('Data indisponível!');
            return redirect()->back();
        }

        // Atualizar a quantidade no horário antigo, se for diferente do novo
        if ($horarioAtual->id !== $novoHorario->id) {
            $horarioAtual->quantidade += 1; // Liberar a vaga no horário antigo
            $horarioAtual->save();

            $novoHorario->quantidade -= 1; // Reservar uma vaga no novo horário
            $novoHorario->save();
        }

        // Atualizar o agendamento com os novos dpdos
        $agendamento->update($request->all());

        toastr()->success('Agendamento atualizado com sucesso!');
        return redirect()->back();
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agendamento $agendamento)
{
    // Se o status for confirmado, incrementar a quantidade de pacientes
    if ($agendamento->status == 'confirmado') {
        $horario = Escala::find($agendamento->id_escala);

        if ($horario) {
            $horario->quantidade += 1;
            $horario->save();
        }
    }

    // Excluir o agendamento
    $agendamento->delete();
    return response()->json(['success'=>'Agendamento deletado']);
}

}

<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Prontuario;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProntuarioController extends Controller
{
    // Método Index: Listar todos os prontuários
    public function index()
    {
        $prontuarios = Prontuario::all();
        return view('admin/prontuario/index', compact('prontuarios'));
    }

    // Método Create: Mostrar formulário (opcional)
    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = User::where('tipo', 'med')->get();
        return view('admin/prontuarios.create', compact('pacientes', 'medicos'));
    }

    // Método Store: Armazenar prontuário
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_paciente' => 'required|exists:pacientes,id',
            'id_medico' => 'required|exists:users,id',
            'data' => 'required|date',
            'tipo_consulta' => 'required|string|max:50',
            'diagnostico' => 'nullable|string|max:255',
            'tratamento' => 'nullable|string',
            'exames_solicitados' => 'nullable|string|max:255',
            'prescricao' => 'nullable|string|max:255',
        ]);

        Prontuario::create($validated);

        toastr()->success('Prontuário criado com sucesso!');
        return redirect()->back();
    }

    // Método Show: Exibir um prontuário
    public function show($id)
    {
        $prontuario = Prontuario::with(['paciente', 'medico'])->findOrFail($id);
        return response()->json($prontuario);
    }

    // Método Edit: Mostrar formulário de edição
    public function edit($id)
    {
        $prontuario = Prontuario::findOrFail($id);
        $pacientes = Paciente::all();
        $medicos = User::where('tipo', 'med')->get();
        return view('admin/prontuarios.edit', compact('prontuario', 'pacientes', 'medicos'));
    }

    // Método Update: Atualizar prontuário
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_paciente' => 'required|exists:pacientes,id',
            'id_medico' => 'required|exists:users,id',
            'data' => 'required|date',
            'tipo_consulta' => 'required|string|max:50|in:pos,pre',
            'diagnostico' => 'nullable|string|max:255',
            'tratamento' => 'nullable|string',
            'exames_solicitados' => 'nullable|string|max:255',
            'prescricao' => 'nullable|string|max:255',
        ]);

        $prontuario = Prontuario::findOrFail($id);
        $prontuario->update($validated);

        toastr()->success('Prontuário atualizado com sucesso!');
        return redirect()->back();
    }

    // Método Destroy: Deletar prontuário
    public function destroy($id)
    {
        $prontuario = Prontuario::findOrFail($id);
        $prontuario->delete();
        
        return response()->json(['success'=>'Prontuario deletado']);

    }
}

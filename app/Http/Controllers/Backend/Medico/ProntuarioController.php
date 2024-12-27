<?php

namespace App\Http\Controllers\Backend\Medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prontuario;
use App\DataTables\Medico\ProntuarioDataTable;
use App\Models\Consulta;

class ProntuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProntuarioDataTable $dataTable)
    {
        return $dataTable->render('medico/prontuario/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medico/prontuario/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validação dos dados recebidos
    $request->validate([
        'id_consulta' => 'required|exists:consultas,id', // Deve existir na tabela consultas
        'diagnostico' => 'nullable|string|max:255',
        'tratamento' => 'nullable|string|max:1000',
        'exames_solicitados' => 'nullable|string|max:500',
        'prescricao' => 'nullable|string|max:500',
    ]);

    // Criação do prontuário
    $prontuario = Prontuario::create([
        'id_consulta' => $request->id_consulta,
        'diagnostico' => $request->diagnostico,
        'tratamento' => $request->tratamento,
        'exames_solicitados' => $request->exames_solicitados,
        'prescricao' => $request->prescricao,
    ]);
    // Mensagem de sucesso
    toastr()->success('Prontuário criado com sucesso!');
    return redirect()->back();
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $prontuario = Prontuario::findOrFail($id);
        return view('medico/prontuario/show', compact('prontuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prontuario = Prontuario::findOrFail($id);
        $consulta = Consulta::where('id',$prontuario->id_consulta)->first();
        return view('medico/prontuario/edit', compact('prontuario','consulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos
        $request->validate([
            'diagnostico' => 'nullable|string|max:255',
            'tratamento' => 'nullable|string|max:1000',
            'exames_solicitados' => 'nullable|string|max:500',
            'prescricao' => 'nullable|string|max:500',
        ]);

        // Busca o prontuário pelo ID
        $prontuario = Prontuario::findOrFail($id);

        // Atualiza os dados do prontuário
        $prontuario->update([
            'diagnostico' => $request->diagnostico,
            'tratamento' => $request->tratamento,
            'exames_solicitados' => $request->exames_solicitados,
            'prescricao' => $request->prescricao,
        ]);
        toastr()->success('Prontuário atualizado com sucesso!');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prontuario = Prontuario::findOrFail($id);
        $prontuario->delete();
        return response()->json(['success'=>'Prontuario deletado']);

    }
}

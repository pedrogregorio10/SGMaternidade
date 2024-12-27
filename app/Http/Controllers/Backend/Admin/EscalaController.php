<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Escala;
use Illuminate\Http\Request;
use App\Models\User;
use App\DataTables\EscalaDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class EscalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EscalaDataTable $dataTable)
    {
        return $dataTable->render('admin/escala/index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicos = User::where('tipo','med')->get();
        return view('admin/escala/create', compact('medicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd(Escala::where('id_medico',$request->id_medico)->first());
        // Validação inicial dos dados

        $request->validate([
            'data' => [
                'required',
                Rule::unique('escalas')->where('id_medico', $request->id_medico),
            ],
            //'hora' => 'required|date_format:H:i',
            'id_medico' => 'required|exists:users,id', // Deve existir na tabela users
            'quantidade' => 'required|integer|min:1', // Garantir que 'quantidade' seja um número inteiro e pelo menos 1
        ],
        [
            'data.unique' => 'Esse medico ja esta escalado na data selecionada',
        ]
    );



        // Verifica se o id_medico pertence a um usuário do tipo 'medico'
        $usuario = User::where('id', $request->id_medico)->where('tipo', 'med')->first();

        if (!$usuario) {
            return response()->json([
                'message' => 'O usuário selecionado não é um médico válido.',
            ], 422); // Código HTTP para erro de validação
        }

        // Criação do horário
        $horario = Escala::create($request->all());


        toastr()->success('Escala cadastrada com sucesso!');
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show(Escala $escala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Escala $escala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Escala $escala)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Escala $escala)
    {
        $escala->delete();
        return response()->json(['success'=>'Escala deletado']);
    }
}

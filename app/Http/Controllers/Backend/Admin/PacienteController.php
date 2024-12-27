<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\DataTables\PacienteDataTable;
use App\Http\Controllers\Controller;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PacienteDataTable $dataTable)
    {
        return $dataTable->render('admin/paciente/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/paciente/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Validação dos dados recebidos

       $request->validate([
        'nome' => 'required|string|max:255',
        'data_nascimento' => 'required|date',
        'n_bi' => 'required|string|max:14|regex:/^[0-9]{9}[A-Za-z]{2}[0-9]{3}$/|unique:pacientes,n_bi,',
        'provincia' => 'required|string|max:255',
        'municipio' => 'required|string|max:255',
        'telefone' => 'required|string|max:15|regex:/^\+244[0-9]{9}$/',
        'estado' => 'required|in:solteiro/a,casado/a',
    ]);

        // Criação do paciente
        $paciente = Paciente::create($request->all());

        toastr()->success('Paciente cadastrado com sucesso!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        return view('admin/paciente/show', compact('paciente'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        return view('admin/paciente/edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
    // Validação dos dados recebidos

        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'n_bi' => 'required|string|max:14|regex:/^[0-9]{9}[A-Za-z]{2}[0-9]{3}$/|unique:pacientes,n_bi,'.$paciente->id,
            'provincia' => 'required|string|max:255',
            'municipio' => 'required|string|max:255',
            'telefone' => 'required|string|max:15|regex:/^\+244[0-9]{9}$/',
            'estado' => 'required|in:solteiro/a,casado/a',
        ]);


    // Atualização dos dados
    $paciente->update($request->all());
    toastr()->success('Paciente atualizado com sucesso!');
    return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return response()->json(['success'=>'Paciente deletado com sucesso!']);

    }
}

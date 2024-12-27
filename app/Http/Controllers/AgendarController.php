<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escala;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Agendamento;
use Illuminate\Database\Eloquent\Builder;
class AgendarController extends Controller
{
       /**
     * Display a listing of the resource.vv
     */
    public function index(Request $request)
    {

        $users = User::with('escala')
        ->where('tipo', 'med')
        ->whereHas('escala',function ($query) {
            $query->where('quantidade', '>', 0);
        });
        if ($request->filled('name')) {
          $users->where('name', 'like', '%' . $request->name . '%');
        };
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
        return view('usuario/agendar/index', compact('users'));
    }

    public function getMedico($id)
    {
            $user = User::where('id', $id)
                          ->where('tipo', 'med')
                          ->whereHas('escala', function ($query) {
                              $query->where('quantidade', '>', 0);
                          })
                          ->with('escala')
                          ->first();

            return view('usuario/agendar/create', compact('user'));

    }
}

<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Medico;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\DataTables\MedicoDataTable;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MedicoDataTable $dataTable)
{
    return $dataTable->render('admin/medico.index');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = User::where('tipo','med')->get();
        return view('admin/medico/create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados do usuário
        $request->validate([
            'name' => 'required|string|max:100',
            'image'=>'image|mimes:png,jpg|max:2048|nullable',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'tipo' => 'required|in:med',
            'telefone' => 'required|string|max:15|regex:/^\+244[0-9]{9}$/',
            'provincia' => 'required|string|max:100',
            'municipio' => 'required|string|max:100',
            'especialidade' => 'required|string|max:255',
            'ordem' => 'required|string|max:20|unique:medicos,ordem',
        ]);

        // Criação do usuário
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'tipo' => $request->input('tipo'),
            'telefone' => $request->input('telefone'),
            'provincia' => $request->input('provincia'),
            'municipio' => $request->input('municipio'),
        ]);

        if($request->hasFile('image')){
            $path = public_path('users');
            $file = $request->file('image');
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path,$file_name);

            //upload image users
            $path_user='users/' . $file_name;
            $user->image=$path_user;
            $user->save();
        }

        // Criação do médico, associando o ID do usuário
            Medico::create([
                'id_user' => $user->id,
                'especialidade' => $request->input('especialidade'),
                'ordem' => $request->input('ordem'),
            ]);

        toastr()->success('Usuário e perfil de médico cadastrados com sucesso!');
        return redirect()->route('medico.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin/medico.show', compact('user'));;
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin/medico.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados de entrada
        $request->validate([
            //'unique:table,column,except,id'
            'name' => 'required|string|max:100',
            'image'=>'image|mimes:png,jpg|max:2048|nullable',
            'email' => 'required|email|unique:users,email,' . $id . '|max:255',
            'tipo' => 'required|in:med',
            'telefone' => 'required|string|max:15|regex:/^\+244[0-9]{9}$/',
            'provincia' => 'required|string|max:100',
            'municipio' => 'required|string|max:100',
            'especialidade' => 'required|string|max:255',
            'ordem' => [
                'required',
                Rule::unique('medicos', 'id_user')->ignore($id),
            ],
        ]);

        // Buscar o usuário existente
        $user = User::findOrFail($id);

          //Image Upload
          if($request->hasFile('image')){
            $path = public_path('users');
            $file = $request->file('image');
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path,$file_name);


            // delete old image

            if(!is_null($user->image)){
                $old_image = public_path($update->image);
                if(File::exists($old_image)){
                    unlink($old_image);
                }
            }
            //update image users
            $path_user='users/' . $file_name;
            $user->image=$path_user;
            $user->save();
        }

        // Atualizando o usuário
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'provincia' => $request->input('provincia'),
            'municipio' => $request->input('municipio'),
            'tipo' => $request->input('tipo'),
        ]);

        // Se o tipo for 'med', atualiza o perfil do médico
        if ($request->input('tipo') === 'med') {
            // Verifica se o médico já existe para o usuário
            $medico = Medico::where('id_user', $user->id)->first();

            if ($medico) {
                // Atualiza o médico existente
                $medico->update([
                    'especialidade' => $request->input('especialidade'),
                    'ordem' => $request->input('ordem'),
                ]);
            } else {
                // Caso o médico não exista, cria um novo
                Medico::create([
                    'id_user' => $user->id,
                    'especialidade' => $request->input('especialidade'),
                    'ordem' => $request->input('ordem'),
                ]);
            }
        } else {
            // Se o tipo não for médico, exclui o perfil de médico (se existir)
            Medico::where('id_user', $user->id)->delete();
        }

        toastr()->success('Usuário e perfil atualizados com sucesso!');
        return redirect()->route('medico.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

       $medico = Medico::where('id_user', $id);
        if ($medico) {
            // Verifica se o médico já existe para o usuário
           $medico->delete();
        }
        $user = User::findOrFail($id);

        $user->delete();
        return response()->json(['success'=>'Medico deletado']);

    }

}

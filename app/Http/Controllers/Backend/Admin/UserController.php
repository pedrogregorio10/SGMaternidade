<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('admin/user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/user/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // Validação dos dados
            $request->validate([
                'name' => 'required|string|max:100',
                'image'=>'image|mimes:png,jpg|max:2048|nullable',
                'email' => 'required|email|unique:users,email|max:255',
                'password' => 'required|string|min:8|confirmed',
                'tipo' => 'required|in:admin,med,recep,user',
                'telefone' => 'required|string|max:15|regex:/^\+244[0-9]{9}$/',
                'provincia' => 'required|string|max:100',
                'municipio' => 'required|string|max:100',
            ]);

            // Criação do usuário
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')), // Criptografa a senha
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

            toastr()->success('Usuario cadastrado com sucesso!');
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin/user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user =User:: findOrFail($id);
        return view('admin/user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validação dos dados de entrada
         $request->validate([
            //'unique:table,column,except,id'
            'name' => 'required|string|max:100',
            'image'=>'image|mimes:png,jpg|max:2048|nullable',
            'email' => 'required|email|unique:users,email,' . $id . '|max:255',
            'tipo' => 'required|in:admin,med,recep,user',
            'telefone' => 'required|string|max:15|regex:/^\+244[0-9]{9}$/',
            'provincia' => 'required|string|max:100',
            'municipio' => 'required|string|max:100',
        ]);

        // Buscar o usuário existente
        $user = User::findOrFail($id);

        // Atualizando o usuário
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'provincia' => $request->input('provincia'),
            'municipio' => $request->input('municipio'),
            'tipo' => $request->input('tipo'),
        ]);

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
        toastr()->success('Usuário e perfil atualizados com sucesso!');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['success'=>'Usuario deletado']);
    }
}

<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'=> ['required', 'max:100'],
            'nickn'=>['max:100'],
            'email'=>['required','email','unique:users,email,'.Auth::user()->id],
            'image'=>['image','max:2048'],
        ]);

        $update=Auth::user();
        $update->name=$request->name;
        $update->email=$request->email;

        if($request->hasFile('image')){
            $path = public_path('users');
            $file = $request->file('image');
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path,$file_name);


            // delete old image

            if(!is_null($update->image)){
                $old_image = public_path($update->image);
                if(File::exists($old_image)){
                    unlink($old_image);
                }
            }
            //update image users
            $path_user='users/' . $file_name;
            $update->image=$path_user;
        }
        $update->save();
        toastr()->success('Seus dados foram alterados com sucesso!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

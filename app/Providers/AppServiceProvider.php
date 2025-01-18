<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(Request $request): void
    {

        try {
            // Tenta acessar o banco de dados para verificar se ele existe
            DB::connection()->getPdo();

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

                view()->share('users', $users);
        } catch (\Exception $e) {
            view()->share('users', []);
        }

    }

}

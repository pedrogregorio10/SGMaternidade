<?php

namespace App\Providers;

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
    public function boot(): void
    {

        try {
            // Tenta acessar o banco de dados para verificar se ele existe
            DB::connection()->getPdo();
                     $users = User::with('escala')
            ->where('tipo', 'med')
            ->whereHas('escala',function ($query) {
                $query->where('quantidade', '>', 0);
            })
            ->get();

            view()->share('users', $users);
        } catch (\Exception $e) {
            view()->share('users', []);
        }

    }

}

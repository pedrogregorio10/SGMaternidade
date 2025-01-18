<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\AgendarController;

Route::get('/', function () {
    return view('index/index');
})->name('index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('agendar', [AgendarController::class, 'lista_agenda_disponivel'])->name('agendar.index')->middleware(['auth']);

Route::get('registrar/agendamento/{id}', [AgendarController::class, 'fazer_agendamento'])->name('agendar.getMedico')->middleware(['auth']);



foreach(File::allFiles(__DIR__.'/web') as $route_file){
    require $route_file->getPathname();
}
require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\Backend\Medico\ViewMedicoController;
use App\Http\Controllers\Backend\Medico\ConsultaController;
use App\Http\Controllers\Backend\Medico\ProntuarioController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth','medico'])->controller(ViewMedicoController::class)->group(function (){

    Route::get('view/medico/dashboard', 'dashboard')->name('view.medico.dashboard');

    Route::get('view/medico/escala', 'escala')->name('view.medico.escala');

    Route::get('view/medico/agendamento', 'agendamento')->name('view.medico.agendamento');

    Route::get('view/medico/agendamento/listar', 'listar')->name('view.medico.listar');

    Route::get('view/medico/agendamento/criar/{id}', 'agendar')->name('view.medico.agendar');

    Route::get('view/medico/agendamento/ver/{id}', 'mostrar')->name('view.medico.show');

    Route::get('view/medico/agendamento/editar/{id}', 'editar')->name('view.medico.edit');

});

Route::resource('consulta', ConsultaController::class)->middleware(['auth','medico']);

Route::resource('prontuario', ProntuarioController::class)->middleware(['auth','medico']);

Route::get('medico/consulta/{id}', [ConsultaController::class, 'confirmarConsulta'])->name('view.medico.consulta')->middleware(['auth']);//recep


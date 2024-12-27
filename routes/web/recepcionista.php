<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Recepcionista\RecepcionistaController;

Route::controller(RecepcionistaController::class)->group(function (){

    Route::get('recepcionista/dashboard', 'dashboard')->name('recepcionista.dashboard');

    Route::get('recepcionista/paciente', 'paciente')->name('recepcionista.paciente');

    Route::get('recepcionista/agendamento', 'agendamento')->name('recepcionista.agendamento');

    Route::get('recepcionista/consulta/medica', 'consulta')->name('recepcionista.consulta');

    Route::get('recepcionista/escala/medica', 'escala')->name('recepcionista.escala');

    Route::get('recepcionista/escala', 'listarAgendaDisponivel')->name('recepcionista.listar.agenda');

    Route::get('recepcionista/agendar', 'agendaConsulta')->name('recepcionista.agendar');
});

Route::resource('recepcionista', RecepcionistaController::class);



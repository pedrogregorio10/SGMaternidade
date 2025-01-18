<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Recepcionista\RecepcionistaController;

Route::middleware(['auth','recepcionista'])->controller(RecepcionistaController::class)->group(function (){

    Route::get('recepcionista/dashboard', 'dashboard')->name('recepcionista.dashboard');

    Route::get('recepcionista/paciente', 'paciente')->name('recepcionista.paciente');

    Route::get('recepcionista/agendamento', 'agendamento')->name('recepcionista.agendamento');

    Route::get('recepcionista/consulta/medica', 'consulta')->name('recepcionista.consulta');

    Route::get('recepcionista/escala/medica', 'escala')->name('recepcionista.escala');

    Route::get('recepcionista/escala', 'listarAgendaDisponivel')->name('recepcionista.listar.agenda');

    Route::get('recepcionista/{id}/agendar', 'agendarConsulta')->name('recepcionista.agendar');

    Route::get('recepcionista/agendamento/{id}','agendamentoShow')->name('recepcionista.agendamento.show');
    Route::get('recepcionista/agendamento/{id}/edit','agendamentoEdit')->name('recepcionista.agendamento.edit');

    Route::get('recepcionista/paciente/create', 'paciente_create')->name('recepcionista.paciente.create');

    Route::get('recepcionista/paciente/{id}','paciente_show')->name('recepcionista.paciente.show');

    Route::get('recepcionista/paciente/{id}/edit','paciente_edit')->name('recepcionista.paciente.edit');

});



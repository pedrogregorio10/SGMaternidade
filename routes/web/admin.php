<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\ProfileController;
use App\Http\Controllers\Backend\Admin\PasswordController;

use App\Http\Controllers\Backend\Admin\UserController;
use App\Http\Controllers\Backend\Admin\MedicoController;
use App\Http\Controllers\Backend\Admin\EscalaController;

use App\Http\Controllers\Backend\Admin\PacienteController;
use App\Http\Controllers\Backend\Admin\AgendamentoController;
use App\Http\Controllers\Backend\Admin\ProntuarioController;

use Illuminate\Support\Facades\Route;

//Admin Routes
Route::controller(AdminController::class)->group(function (){

    Route::get('admin/login', 'login')->name('admin.login')->middleware('guest');

    Route::get('admin/register','register')->name('admin.register')->middleware('guest');

    Route::get('admin/dashboard','create')->name('admin.dashboard')->middleware(['auth','verified','admin']);

    Route::get('admin/forgot-password','forgot_password')->name('admin.forgot-password')->middleware('guest');

    Route::get('admin/profile','edit')->name('admin.profile.edit')->middleware(['auth','admin']);
});

Route::patch('admin/profile/update', [ProfileController::class,'update'])->name('admin.profile.update');

Route::post('admin/profile/update/password', [PasswordController::class, 'update'])->name('admin.update.password')->middleware('auth');

Route::resource('user', UserController::class)->middleware(['auth','admin']);

Route::resource('paciente', PacienteController::class)->middleware(['auth','admin']);


Route::resource('medico', MedicoController::class)->middleware(['auth','admin']);

Route::resource('escala', EscalaController::class)->middleware(['auth','admin']);

//Agendamento route
Route::controller(AgendamentoController::class)->group(
    function () {

Route::get('agendamento','index')->name('agendamento.index')->middleware(['auth','admin']);

Route::get('agendamento/create','create')->name('agendamento.create')->middleware(['auth','admin']);

Route::get('agendamento/{agendamento}','show')->name('agendamento.show')->middleware(['auth','admin']);

Route::get('agendamento/{agendamento}/edit','edit')->name('agendamento.edit')->middleware(['auth','admin']);

Route::post('agendamento','store')->name('agendamento.store')->middleware(['auth']);

Route::put('agendamento/{agendamento}','update')->name('agendamento.update')->middleware(['auth']);

Route::delete('agendamento/{agendamento}','destroy')->name('agendamento.destroy')->middleware(['auth']);

Route::get('listar/agenda','listar')->name('listar.agenda')->middleware(['auth','admin']);

Route::get('admin/agendar/consulta/{id}','agendar')->name('criar.agenda')->middleware(['auth','admin']);
});

//Paciente route
Route::controller(PacienteController::class)->group(
    function () {

Route::get('paciente','index')->name('paciente.index')->middleware(['auth','admin']);

Route::get('paciente/create','create')->name('paciente.create')->middleware(['auth','admin']);

Route::get('paciente/{paciente}','show')->name('paciente.show')->middleware(['auth','admin']);

Route::get('paciente/{paciente}/edit','edit')->name('paciente.edit')->middleware(['auth','admin']);

Route::post('paciente','store')->name('paciente.store')->middleware(['auth']);

Route::put('paciente/{paciente}','update')->name('paciente.update')->middleware(['auth']);

Route::delete('paciente/{paciente}','destroy')->name('paciente.destroy')->middleware(['auth']);

Route::get('listar/agenda','listar')->name('listar.agenda')->middleware(['auth','admin']);

Route::get('admin/agendar/consulta/{id}','agendar')->name('criar.agenda')->middleware(['auth','admin']);
});


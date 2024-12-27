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

Route::resource('agendamento', AgendamentoController::class)->middleware(['auth','admin']);

Route::get('listar/agenda', [AgendamentoController::class,'listar'])->name('listar.agenda');

Route::get('admin/agendar/consulta/{id}', [AgendamentoController::class,'agendar'])->name('criar.agenda');

Route::resource('prontuario', ProntuarioController::class);

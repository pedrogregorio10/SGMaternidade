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

Route::get('agendar', [AgendarController::class, 'index'])->name('agendar.index');
Route::get('agendar/{id}', [AgendarController::class, 'getMedico'])->name('agendar.getMedico');



foreach(File::allFiles(__DIR__.'/web') as $route_file){
    require $route_file->getPathname();
}
require __DIR__.'/auth.php';

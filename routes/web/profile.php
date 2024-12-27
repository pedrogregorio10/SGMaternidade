<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


//User Profile routes
Route::middleware('auth')->name('profile.')->controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'edit')->name('edit');
    Route::patch('/profile', 'update')->name('update');
    Route::delete('/profile', 'destroy')->name('destroy');
});

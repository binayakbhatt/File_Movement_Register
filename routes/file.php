<?php

use App\Http\Controllers\File\FileRegisterController;
use Illuminate\Support\Facades\Route;


// Route::group(['middleware' =>['auth']], function () {
//     Route::resource('file', FileRegisterController::class)->only(['index', 'store', 'create', 'edit']);
// });

Route::resource('file', FileRegisterController::class)->only(['index', 'store', 'create', 'edit'])->middleware('auth');

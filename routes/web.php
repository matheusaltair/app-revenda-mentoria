<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RevendaController;

Route::get('/', function () {
    return redirect('/revenda');
});
Route::resource('posts', PostController::class);
Route::resource('revenda', RevendaController::class);

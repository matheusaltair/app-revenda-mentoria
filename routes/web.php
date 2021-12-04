<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RevendaController;

Route::resource('posts', PostController::class);
Route::resource('revenda', RevendaController::class);
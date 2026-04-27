<?php

use Illuminate\Support\Facades\Route;
use Lara\Http\Controllers\LaraController;

// All routes will have the prefix "lara"
Route::get('ip', [LaraController::class, 'ip'])->name('ip');

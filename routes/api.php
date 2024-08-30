<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/health', fn () => 'OK');

Route::post('/auth/register', [AuthController::class, 'register'])->name('register');

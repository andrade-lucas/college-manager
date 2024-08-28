<?php

use Illuminate\Support\Facades\Route;

// Route::get('/health', function () {
//     return 'OK';
// });

Route::get('/health', fn () => 'OK');

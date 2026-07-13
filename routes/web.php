<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;

Route::get('/', function () {
    return view('portfolio');
});

Route::get('/laravel', function () {
    return view('welcome');
});

Route::post('/api/chat', [ChatbotController::class, 'chat']);

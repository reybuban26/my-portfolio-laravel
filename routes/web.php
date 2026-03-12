<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/portfolio', function () {
    return view('portfolio');
});

Route::post('/api/chat', [ChatbotController::class, 'chat']);

Route::get('/setup-db', function() {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return "Naka-pag migrate na ng database, Rey! Success!";
    } catch (\Exception $e) {
        return "May error sa database: " . $e->getMessage();
    }
});

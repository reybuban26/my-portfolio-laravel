<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('portfolio');
});

Route::get('/cv', function () {
    return view('cv');
});

Route::get('/curriculum-vitae', function () {
    return view('cv');
});

Route::get('/download-cv', function () {
    $filePath = public_path('docs/Rey_Buban_Curriculum_Vitae.pdf');
    if (!file_exists($filePath)) {
        abort(404, 'Curriculum Vitae file not found.');
    }
    return response()->download($filePath, 'Rey_Buban_Curriculum_Vitae.pdf', [
        'Content-Type' => 'application/pdf',
    ]);
});

Route::get('/laravel', function () {
    return view('welcome');
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

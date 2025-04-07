<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrisonerController;
use App\Http\Controllers\CellController;
use App\Http\Controllers\CellHistoryController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\UsersController;

// Default routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(callback: function () {
    Route::resource('/prisoners', controller: PrisonerController::class)->middleware('readonly');
    Route::get('storage/{path}', function($path) {
        $fullPath = storage_path('app/public/' . $path);
        dd($fullPath);
        if (file_exists($fullPath)) {
            return response()->file($fullPath);
        }
        return abort(404);
    })->where('path', '.*');
    
    Route::resource('/cells', controller: CellController::class)->middleware('readonly');
    Route::resource('/cellHistories', controller: CellHistoryController::class)->middleware('readonly');
    Route::resource('/incidents', controller: IncidentController::class)->middleware('readonly');

    Route::resource(name: '/users', controller: UsersController::class)->middleware('role:2');
});

// Static routes
Route::get('/static/{type}/{path}', function ($type, $path) {
    // Map file extensions to correct MIME types
    $mimeTypes = [
        'js'  => 'application/javascript',
        'css' => 'text/css',
        'svg' => 'image/svg+xml'
    ];

    // Check if it's accessing the /static/assets directory
    if ($type === 'assets') {
        // Generate the full file path for the requested asset
        $filePath = resource_path("assets/$path");
    } else {
        // Handle /static/js/{path} and /static/css/{path}
        $validTypes = ['js', 'css'];
        if (!in_array($type, $validTypes)) {
            abort(404);
        }
        $filePath = resource_path("$type/$path");
    }

    // Check if the requested file exists
    if (!file_exists($filePath)) {
        abort(404);
    }

    // Get the file extension dynamically to set the correct MIME type
    $extension = pathinfo($filePath, PATHINFO_EXTENSION);

    // Determine MIME type, default to application/octet-stream if not found
    $contentType = $mimeTypes[$extension] ?? 'application/octet-stream';

    // Return the file with the correct MIME type
    return response()->file($filePath, ['Content-Type' => $contentType]);
})->where(['type' => 'js|css|assets', 'path' => '.*']);

require __DIR__.'/auth.php';

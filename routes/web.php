<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrisonerController;

// Default routes
Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Prisoners routes
Route::resource('/prisoners', PrisonerController::class);

// Profile Routes
Route::middleware('auth')->group(callback: function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');    
});

// Static routes
Route::get('/static/js/{path}', function ($path) {
    $fullPath = resource_path('js/' . $path);
    if (!file_exists($fullPath)) {
        abort(404);
    }
    return response()->file($fullPath, ['Content-Type' => 'application/javascript']);
})->where('path', '.*');

Route::get('/static/css/{path}', function ($path) {
    $fullPath = resource_path('css/' . $path);
    if (!file_exists($fullPath)) {
        abort(404);
    }
    return response()->file($fullPath, ['Content-Type' => 'text/css']);
})->where('path', '.*');

require __DIR__.'/auth.php';

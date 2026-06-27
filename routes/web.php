<?php
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Route;

use App\Models\Idea;

use App\Http\Controllers\IdeaController;

use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Auth\SessionController;

Route::get('/', function () {
    return 'Placeholder for the homepage';
});


Route::middleware('auth')->group(function () {
    Route::get('/ideas', [IdeaController::class, 'index']);
    Route::get('/ideas/create', [IdeaController::class, 'create']);
    Route::post('/ideas', [IdeaController::class, 'store']);
    Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit']);
    Route::patch('/ideas/{idea}', [IdeaController::class, 'update']);
    Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy']);

    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');
});


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});


Route::get('/admin', function () {
    Gate::authorize('view-admin');
    return 'Placeholder for the admin page';
});
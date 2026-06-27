<?php
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Route;

use App\Models\Idea;

use App\Http\Controllers\IdeaController;

use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Auth\SessionController;

//Get all ideas
Route::get('/ideas', [IdeaController::class, 'index']);

//Get a single idea
Route::get('/ideas/{idea}', [IdeaController::class, 'show']);


//Edit an idea by id
Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit']);


//Update an idea by id
Route::patch('/ideas/{idea}', [IdeaController::class, 'update']);

//Create a new idea form

Route::get('/create', [IdeaController::class, 'create']);

//Create a new idea
Route::post('/ideas', [IdeaController::class, 'store']);

//Delete an idea by id
Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy']);

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::delete('/logout', [SessionController::class, 'destroy']);

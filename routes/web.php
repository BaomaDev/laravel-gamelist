<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('layouts.master', ['imagePath' => asset('ERD.png')]);
});

Route::get('/game/create', [GameController::class, 'create']);
Route::post('/game', [GameController::class, 'store']);

Route::get('/game', [GameController::class, 'index']);
Route::get('/game/{id}', [GameController::class, 'show']);

Route::get('/game/{id}/edit', [GameController::class, 'edit']);
Route::put('/game/{id}', [GameController::class, 'update']);

Route::delete('/game/{id}', [GameController::class, 'destroy']);

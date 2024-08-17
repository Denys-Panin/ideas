<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\IdeaController;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomePageController::class, 'index'])->name('homepage');
Route::post('/idea', [IdeaController::class, 'store'])->name('idea.create');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

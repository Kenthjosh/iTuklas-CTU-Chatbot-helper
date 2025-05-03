<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/chat', [ChatController::class, 'index'])->name('chat');
// Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');

Route::get('/chat', function () {
    return view('chat.index'); // matches your folder structure
});
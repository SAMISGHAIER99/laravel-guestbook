<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestbookController;

// Home = guestbook
Route::get('/', [GuestbookController::class, 'index'])->name('guestbook.index');

// CRUD messaggi
Route::post('/messages', [GuestbookController::class, 'store'])->name('messages.store');
Route::get('/messages/{message}/edit', [GuestbookController::class, 'edit'])->name('messages.edit');
Route::put('/messages/{message}', [GuestbookController::class, 'update'])->name('messages.update');
Route::delete('/messages/{message}', [GuestbookController::class, 'destroy'])->name('messages.destroy');

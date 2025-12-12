<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestbookController;

Route::get('/guestbook', [GuestbookController::class, 'index']);
Route::post('/messages', [GuestbookController::class, 'store']) ->name('messages.store'); // i name-> sono i nomi dei metodi che i blade roescomno a vedere dal index 
Route::get('/messages/{message}/edit',[GuestbookController::class, 'edit'])->name('messages.edit');
Route::put('/messages/{message}',[GuestbookController::class, 'update'])->name('messages.update');
Route::delete('/messages/{message}',[GuestbookController::class,'destroy'])->name('messages.destroy');
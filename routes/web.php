<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuestbookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // GUESTBOOK
    Route::get('/guestbook', [GuestbookController::class, 'index'])->name('messages.index');
    Route::post('/guestbook', [GuestbookController::class, 'store'])->name('messages.store');
    Route::get('/guestbook/{message}/edit', [GuestbookController::class, 'edit'])->name('messages.edit');
    Route::put('/guestbook/{message}', [GuestbookController::class, 'update'])->name('messages.update');
    Route::delete('/guestbook/{message}', [GuestbookController::class, 'destroy'])->name('messages.destroy');
});

require __DIR__.'/auth.php';

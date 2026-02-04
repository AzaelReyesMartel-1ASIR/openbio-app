<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    $user = User::with('links')->first();

    return view('welcome', [
        'user' => $user
    ]);
});

Route::get('/go/{link}', [LinkController::class, 'visit'])->name('links.visit');

Route::get('/dashboard', [LinkController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Create
    Route::get('/links/create', [LinkController::class, 'create'])->name('links.create');
    Route::post('/links', [LinkController::class, 'store'])->name('links.store');

    // Edit
    Route::get('/links/{link}/edit', [LinkController::class, 'edit'])->name('links.edit');
    Route::put('/links/{link}', [LinkController::class, 'update'])->name('links.update');

    // Delete
    Route::delete('/links/{link}', [LinkController::class, 'destroy'])->name('links.destroy');

    // Avatar
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
});

require __DIR__.'/auth.php';

<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('users', function () {
    return Inertia::render('Users', [
        'users' => \App\Models\User::latest()->get(),
    ]);
})->middleware(['auth', 'verified'])->name('users.index');

Route::post('users', function () {

    if (User::count() > 2000) {
        return 'stop !';
    }

    User::factory()->create();

    return redirect()->back();
})->middleware(['auth', 'verified'])->name('users.random');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

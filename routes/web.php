<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Folio\Folio;
Route::domain('inertia.currency.online')->group(function () {
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::domain('inertia.currency')->group(function () {
//     // dump('bigled');
//     return Inertia::render('BigLed');
// })->name('bigLed');


Route::get('/bigled', function(){

    // dump('bigled');
 return   Inertia::render('BigLed');
})->name('bigLed');

});

// Route::domain('admin.currency.test')->group(function () {
//     Route::get('/test', function () {
//         return 'مرحبًا في لوحة الإدارة!';
//     });
// });

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Guest\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, "index"])->name("homepage");

Route::middleware('auth')->prefix("admin")->name("admin.")->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::resource('projects', ProjectController::class);
    Route::resource('types', TypeController::class);
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

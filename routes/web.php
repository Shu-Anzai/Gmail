<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;

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
});

Route::get('/main', [TestController::class, 'index'])->middleware('auth');

Route::get('/mypage', [TestController::class, 'myUrl'])->middleware('auth');

Route::post('/main', [TestController::class, 'newUrl']);

Route::post('/reg', [TestController::class, 'regNewUrl']);

Route::get('/edit/{id}', [TestController::class, 'edit']);

Route::post('/edit/{id}', [TestController::class, 'updateUrl']);

Route::post('/save/{id}', [TestController::class, 'save']);

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;

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

Route::get('/', [Controller::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/file-import', [Controller::class, 'import'])->middleware(['auth', 'verified'])->name('file-import');

Route::resource('bids' , BidController::class);

Route::get('/register', function () {
    return redirect('/');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::delete('/destroy/{id}', [Controller::class, 'destroy'])->name('product.destroy');
    // Route::delete('/destroy/{id}', [BidController::class, 'destroy'])->name('bid.destroy');
});

require __DIR__.'/auth.php';
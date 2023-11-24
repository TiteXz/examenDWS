<?php

use App\Http\Controllers\ManzanasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/dashboard', function (Request $request) {
    $user = $request->user();

    $datos = [
        'name' => $user->name
    ];

    return view('dashboard')->with(array_merge($datos));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/formulario-insertar', [ManzanasController::class, 'create'])->name('formulario-insertar');

Route::post('/insertar-manzana',[ManzanasController::class, 'store'])->name('insertar-manzana');

Route::get('/verManzanas', [ManzanasController::class, 'index'])->name('verManzanas');

Route::get('/editar-manzana/{id}', [ManzanasController::class, 'edit'])->name('editar-manzana');
Route::patch('/actualizar-manzana/{id}', [ManzanasController::class, 'update'])->name('actualizar-manzana');
Route::delete('/eliminar-manzana/{id}', [ManzanasController::class, 'destroy'])->middleware('log.eliminada')->name('eliminar-manzana');

require __DIR__.'/auth.php';

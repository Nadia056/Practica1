<?php

use App\Http\Controllers\BikeController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VueBikeController;
use App\Http\Controllers\VuePersonaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
Route::get('/registro', [BikeController::class, 'index'])->name('registro');
Route::post('/registro', [BikeController::class, 'add']);
Route::get('/moto', [BikeController::class, 'info'])->name('info');
Route::post('/moto', [BikeController::class, 'update']);
Route::get('/moto/{id}', [BikeController::class, 'delete'])->name('delete');



Route::get('/personas',[PersonaController::class,'index2'])->name('personas');
Route::get('/info2',[PersonaController::class,'info2'])->name('info2');
Route::post('/personas',[PersonaController::class,'AddPerson']);
Route::post('/info2',[PersonaController::class,'updatePerson']);
Route::get('/personas/{id}',[PersonaController::class,'deletePerson'])->name('deletePer');



Route::get('/form', [VueBikeController::class, 'edit']);
Route::get('/edit/{id}', [VueBikeController::class, 'edit'])->name('edit');

Route::get('/bikes', [VueBikeController::class, 'index']);
Route::post('/bikes', [VueBikeController::class, 'store']);


Route::get('/infobike',[VueBikeController::class,'info']);
Route::put('/infobike', [VueBikeController::class, 'update']);
Route::delete('/infobike/{id}',[VueBikeController::class,'delete']);


Route::get('/registroPersona', [VuePersonaController::class, 'index']);
Route::post('/registroPersona', [VuePersonaController::class, 'add']);

Route::get('/infopersona',[VuePersonaController::class,'info']);
Route::put('/infopersona',[VuePersonaController::class,'update']);
Route::delete('/infopersona/{id}',[VuePersonaController::class,'delete']);

//Route::post('/form',[ VueBikeController::class,'store']);

require __DIR__.'/auth.php';



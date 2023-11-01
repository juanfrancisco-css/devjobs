<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use Livewire\Livewire;
use App\Mail\DevjobsMail;
use App\Livewire\CrearVacante;
use App\Livewire\MostrarVacante;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\NotificacionHistorialController;

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
//Livewire::component('crear-vacante', CrearVacante::class);
Livewire::component('mostrar-vacante', MostrarVacante::class);

Route::get('/', HomeController::class)->name('home');
/*********************Correo de prueba ************************************ */
Route::get('/enviar-correo', function () {
    Mail::to('devjobs@gamil.com')
               ->send(new DevjobsMail());
    return view('welcome');
});
/****************************************************************** */

Route::get('/notificaciones',NotificacionController::class)->middleware(['auth', 'verified','rol.reclutador'])->name('notificaciones');
Route::get('/notificaciones/leidas',[NotificacionHistorialController::class,'index'])->middleware(['auth', 'verified','rol.reclutador'])->name('notificacioneshistorial.index');

Route::get('/dashboard', [VacanteController::class,'index'])->middleware(['auth', 'verified','rol.reclutador'])->name('vacantes.index');
Route::get('/vacantes/create', [VacanteController::class,'create'])->middleware(['auth', 'verified'])->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit', [VacanteController::class,'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');
//debes de estar autenticada pero tambien debes de estar verificado
Route::get('/vacantes/{vacante}/', [VacanteController::class,'show'])->name('vacantes.show');

Route::get('/candidatos/{vacante}/',[CandidatoController::class,'index'])->name('candidatos.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

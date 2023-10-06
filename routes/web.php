<?php

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\NotaController;
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
    return view('Home.index');    
});
Route::get('estudiantes/CargarEstudiante/{curso}',[EstudianteController::class,'GetEstudiantes']);
Route::resource('notas', NotaController::class);
Route::resource('asignaturas', AsignaturaController::class);
Route::resource('estudiantes',EstudianteController::class);
Route::resource('cursos',CursoController::class);

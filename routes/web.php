<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;


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

// Route page principale
Route::get('/', function () {
    return view('welcome');
});

// Route page affiche la liste des etudiants
Route::get('/etudiant', [EtudiantController::class, "index"])->name("etudiant.index");

// Route page voir un etudiant (id)
Route::get('/etudiant/{etudiant}', [EtudiantController::class, "show"])->name("etudiant.show");

// Route page d'ajoute d'un etudiant
Route::get('/etudiant-create', [EtudiantController::class, "create"])->name("etudiant.create");
Route::post('/etudiant-create', [EtudiantController::class, "store"]);

// Route page pour editer un etudiant
Route::get('/etudiant-edit/{etudiant}', [EtudiantController::class, "edit"])->name("etudiant.edit");
Route::put('/etudiant-edit/{etudiant}', [EtudiantController::class, "update"]);
Route::delete('/etudiant/{etudiant}', [EtudiantController::class, "destroy"]);


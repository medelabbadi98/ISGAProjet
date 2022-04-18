<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;

//pages
Route::get('page_candidat', [AuthController::class, 'index'])->name('page_candidat');
Route::get('page_recruteur', [AuthController::class, 'index'])->name('page_recruteur');
Route::get('page_sttings', [AuthController::class, 'index'])->name('page_settings');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//ajouter routes
Route::get('ajouter_about', [AuthController::class, 'ajouterabout'])->name('ajouter_about');
Route::get('ajouter_offre', [AuthController::class, 'ajouteroffre'])->name('ajouter_offre');
Route::get('ajouter_competence', [AuthController::class, 'ajoutercompetence'])->name('ajouter_competence');
Route::get('ajouter_diplome', [AuthController::class, 'ajouterdiplome'])->name('ajouter_diplome');
Route::get('ajouter_experience', [AuthController::class, 'ajouterexperience'])->name('ajouter_experience');
Route::get('ajouter_langue', [AuthController::class, 'ajouterlangue'])->name('ajouter_langue');
//Edit routes
Route::get('edit_about', [AuthController::class, 'editabout'])->name('edit_about');
Route::get('edit_competence', [AuthController::class, 'editcompetence'])->name('edit_competence');
Route::get('edit_diplome', [AuthController::class, 'editdiplome'])->name('edit_diplome');
Route::get('edit_experience', [AuthController::class, 'editexperience'])->name('edit_experience');
Route::get('edit_langue', [AuthController::class, 'editlangue'])->name('edit_langue');
  







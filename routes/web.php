<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\DiplomeController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\MaitriserController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\PostulerController;
use App\Http\Controllers\RecruteurController;
use App\Http\Controllers\SecteurController;


///////////////////////////pages
Route::get('pagecandidat', [CandidatController::class, 'index'])->name('pagecandidat');
Route::get('pagerecruteur', [RecruteurController::class, 'index'])->name('pagerecruteur');
Route::get('pagesettings', [CandidatController::class, 'setting'])->name('pagesettings');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

///////////////////////////ajouter routes
//Route::get('ajouterabout', [AboutController::class, 'ajouterabout'])->name('ajouterabout');
//ajouter candidat
Route::post('ajoutercandidat', [CandidatController::class, 'store'])->name('ajoutercandidat.post');
//offre
Route::get('ajouteroffre', [OffreController::class, 'ajouteroffre'])->name('ajouteroffre');
Route::post('addoffre', [OffreController::class, 'store'])->name('ajouteroffre.post');
//competence
Route::get('ajoutercompetence', [CompetenceController::class, 'index'])->name('ajoutercompetence');
Route::post('ajoutercompetence', [CompetenceController::class, 'store'])->name('ajoutercompetence.post');
//diplome
Route::get('ajouterdiplome', [DiplomeController::class, 'index'])->name('ajouterdiplome');
Route::post('ajouterdiplome', [DiplomeController::class, 'store'])->name('ajouterdiplome.post');
//experience
Route::get('ajouterexperience', [ExperienceController::class, 'ajouterexperience'])->name('ajouterexperience');
Route::post('ajouterexperience', [ExperienceController::class, 'store'])->name('ajouterexperience.post');
//langue
Route::get('ajouterlangue', [LangueController::class, 'ajouterlangue'])->name('ajouterlangue');
Route::post('ajouterlangue', [MaitriserController::class, 'store'])->name('ajouterlangue.post');


///////////////////////////Edit routes
//about
Route::post('editabout', [CandidatController::class, 'editabout'])->name('editabout.post');
Route::get('editabout', [CandidatController::class, 'about']);
//competence
Route::get('editcompetence/{ID_Cmp?}', [CompetenceController::class, 'editcompetence'])->name('editcompetence');
Route::post('editcompetence/{ID_Cmp?}', [CompetenceController::class, 'update'])->name('editcompetence.post');
//diplome
Route::get('editdiplome/{ID_Dip?}', [DiplomeController::class, 'editdiplome']);
Route::post('editdiplome/{ID_Dip?}', [DiplomeController::class, 'update'])->name('editdiplome.post');
//experience
Route::get('editexperience/{ID_Exp?}', [ExperienceController::class, 'editexperience']);
Route::post('editexperience/{ID_Exp?}', [ExperienceController::class, 'update'])->name('editexperience.post');
//langue
Route::get('editlangue', [LangueController::class, 'editlangue'])->name('editlangue');
Route::post('Modifierlangue', [LangueController::class, 'update'])->name('editlangue.post');
  







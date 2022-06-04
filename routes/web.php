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
use App\Http\Controllers\AboutController;




Route::get('candidatSettings', [CandidatController::class, 'getsettings'])->name('candidatSettings');
Route::post('candidatSettings', [CandidatController::class, 'update'])->name('editCandidat.post');
//Recruteur
Route::get('recruteurSettings', [RecruteurController::class, 'getsettings'])->name('recruteurSettings');
Route::post('recruteurSettings', [RecruteurController::class, 'update'])->name('editRecruteur.post');
Route::get('/', [HomeController::class, 'index']);

Route::get('pagecandidat', [CandidatController::class, 'index'])->name('pagecandidat');
Route::get('pagerecruteur', [RecruteurController::class, 'index'])->name('pagerecruteur');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

///offres
Route::get('offre-emploi', [OffreController::class, 'index'])->name('offre');
Route::get('offre-emploi-page/{Id_Offre}', [OffreController::class, 'getOffrePage'])->name('offre-page');
Route::match(['get', 'post'],'offre-emploi/{Id_sec}',[OffreController::class,'ChercherOffre'])->name('ChercherOffre');
//ListeCandidats
Route::get('lesCandidats', [CandidatController::class, 'list']);
Route::get('candidat-page/{CIN}', [CandidatController::class, 'getcandidatPage']);

//ListeRecruteurs
Route::get('lesRecruteurs', [RecruteurController::class, 'list']);
Route::get('recruteur-page/{CIN}', [RecruteurController::class, 'getrecruteurPage']);

//Find Candidats
Route::get('/findMot',[CandidatController::class, 'findM'])->name('findMot');
Route::get('/findSec',[CandidatController::class, 'findS'])->name('findSec');

//Find Recruteurs
Route::get('/find',[RecruteurController::class, 'find'])->name('find');


///////////////////////////ajouter routes
//Route::get('ajouterabout', [AboutController::class, 'ajouterabout'])->name('ajouterabout');
//ajouter candidat
Route::post('ajouter/candidat',[CandidatController::class, 'store'])->name('ajouterCandidat.post');
//Recruteur
Route::post('ajouter/recruteur',[RecruteurController::class, 'store'])->name('ajouterRecruteur.post');

//Route::post('ajoutercandidat', [CandidatController::class, 'store'])->name('ajoutercandidat.post');

Route::post('addsettings', [HomeController::class, 'store'])->name('ajoutersettings.post');
Route::get('ajoutersettings', [HomeController::class, 'index'])->name('ajoutersettings');

//offre
Route::get('Ajouter-offre', [OffreController::class, 'ajouteroffre']);
Route::post('Ajouter-offre', [OffreController::class, 'store'])->name('ajouteroffre.post');

//postuler
Route::get('offre-emploi-page/postuler/{Id_offre}',[OffreController::class,'postuler']);
Route::get('offre-emploi-page/postuler/delete/{Id_offre}',[OffreController::class,'deletePostulation']);

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
Route::get('editabout', [AboutController::class, 'get']);
Route::post('editabout', [AboutController::class, 'edit']);


//offre
Route::get('modifieroffre', [OffreController::class, 'modifieroffre'])->name('modifieroffre');
Route::post('editoffre', [OffreController::class, 'update'])->name('modifieroffre.post');
Route::get('woffre/{Nom_Sec}', [OffreController::class, 'edit'])->name('woffre');


//competence
Route::get('editcompetence/{ID_Cmp?}', [CompetenceController::class, 'editcompetence'])->name('editcompetence');
Route::post('editcompetence/{ID_Cmp?}', [CompetenceController::class, 'update'])->name('editcompetence.post');
//diplome
Route::get('editdiplome/{ID_Dip?}', [DiplomeController::class, 'editdiplome']);
Route::post('editdiplome/{ID_Dip?}', [DiplomeController::class, 'update'])->name('editdiplome.post');
//experience
Route::get('editexperience/{ID_Exp?}', [ExperienceController::class, 'editexperience']);
Route::post('editexperience/exp/{ID_Exp?}', [ExperienceController::class, 'update']);
//langue
Route::get('editlangue/{ID_Lg?}', [LangueController::class, 'editlangue'])->name('editlangue');
Route::post('editlangue/langue/{ID_Lg?}', [MaitriserController::class, 'update']);
  


///////////////////////////Supprimer routes
//experience
Route::get('delete/Exp/{ID_Exp}',[ExperienceController::class, 'destroy']);
//diplomes
Route::get('delete/Dip/{ID_Dip}',[DiplomeController::class, 'destroy']);
//langues
Route::get('delete/lang/{Id_LG}',[MaitriserController::class, 'destroy']);
//competence
Route::get('delete/cmp/{Id_Cmp}',[CompetenceController::class, 'destroy']);
//offre
Route::get('delete/offre/{ID_Offre}',[OffreController::class, 'destroy']);





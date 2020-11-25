<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ConversationController;

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

Route::get('/', [JobController::class, 'accueil'])->name('accueil');
//Route::get('/{connect}', [JobController::class, 'accueil'])->name('accueil_connect');
/*Route::get('/pls_connect', function () {
    return view('ask_connect');
})->name('connect');*/
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
//Route::get('/jobs/session("nom_dession")', [JobController::class, 'show_city'])->name('jobs.show_cities');
Route::get('/jobs/annonces', [JobController::class, 'show'])->name('jobs.show');
Route::get('/jobs/annonces/{title}/{description}', [JobController::class, 'show'])->name('jobs.show_d');
Route::get('/home', [HomeController::class, 'display'])->name('home.home');
Route::post('/home/ajouter', [HomeController::class, 'create'])->name('image');
Route::get('/home/ajouter', [HomeController::class, 'display_create'])->name('image_ajouter');
Route::get('/home/modifier', [HomeController::class, 'display_modify'])->name('home.homemodify');
Route::post('/home/modifier', [HomeController::class, 'update'])->name('image_modifier');
Route::get('/home/supprimer', [HomeController::class, 'display_delete'])->name('home.homedelete');
Route::post('/home/supprimer', [HomeController::class, 'delete'])->name('image_supprimer');
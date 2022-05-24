<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EtudiantController;
use \App\Http\Controllers\CustomAuthController;
use \App\Http\Controllers\LocalizationController;
use \App\Http\Controllers\ArticleController;
use \App\Http\Controllers\DocumentController;



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
    return view('welcome');
});

Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant');
Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('/etudiant/create/post', [EtudiantController::class, 'create'])->name('registrariat.create');
Route::post('/etudiant/create/post', [EtudiantController::class, 'store'])->name('registrariat.store');
Route::get('etudiant/{etudiant}/edit', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('etudiant/{etudiant}/edit', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('etudiant/{etudiant}', [EtudiantController::class, 'destroy']);

Route::get('/forum', [ArticleController::class, 'index'])->name('forum')->middleware('auth');
Route::get('/forum-show', [ArticleController::class, 'show'])->name('forum.show')->middleware('auth');
Route::get('/forum/create/post', [ArticleController::class, 'create'])->name('forum.create')->middleware('auth');
Route::post('forum/create/post', [ArticleController::class, 'store'])->name('forum.store')->middleware('auth');
Route::get('forum/{article}/edit', [ArticleController::class, 'edit'])->name('forum.edit')->middleware('auth');
Route::put('forum/{article}/edit', [ArticleController::class, 'update'])->middleware('auth');
Route::get('/forum/{article}', [ArticleController::class, 'destroy'])->name('forum.delete');
Route::delete('/forum/{article}', [ArticleController::class, 'destroy']);

Route::get('/doc', [DocumentController::class, 'index'])->name('doc')->middleware('auth');
Route::get('/doc-show', [DocumentController::class, 'show'])->name('doc.show')->middleware('auth');
Route::get('/doc/create/post', [DocumentController::class, 'create'])->name('doc.create')->middleware('auth');
Route::post('doc/create/post', [DocumentController::class, 'store'])->name('doc.store')->middleware('auth');
Route::get('doc/{document}/edit', [DocumentController::class, 'edit'])->name('doc.edit')->middleware('auth');
Route::put('doc/{document}/edit', [DocumentController::class, 'update'])->middleware('auth');
Route::get('/doc/{document}', [DocumentController::class, 'destroy'])->name('doc.delete');
Route::delete('/doc/{document}', [DocumentController::class, 'destroy']);


Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('custom.login');
Route::get('registration', [CustomAuthController::class, 'create'])->name('registration');;
Route::post('custom-registration', [CustomAuthController::class, 'store'])->name('custom.registration');

Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');
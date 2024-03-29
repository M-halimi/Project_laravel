<?php

use App\Http\Controllers\AuthControllershowLoginForm;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\StagierController;
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

Route::post('/logout', 'AuthController@logout')->name('logout');Route::get('/', function () {
    return view('layout.app');
});
Route::get("dashboard", function(){
    return view("dashboard");
})->name("dashboard");
Route::resource('groupe',GroupeController::class);
Route::get('/searche',[GroupeController::class,'searche'])->name('groupe.searche');

Route::resource('stagier',StagierController::class);
Route::get('/search',[StagierController::class,'search'])->name('stagier.search');

Route::resource('modele',ModeleController::class);
Route::get('/serche',[ModeleController::class,'serche'])->name('modele.serche');

Route::resource('notes',NoteController::class);
Route::get('/serchea',[NoteController::class,'serchea'])->name('notes.serchea');
// Route::get('/chart', [StagierController::class, 'chart'])->name('chart');

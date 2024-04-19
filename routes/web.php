<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\EtudiantController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



///////////////////////////////////////////////
Route::middleware('auth:admin')->group(function (){
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
    });

    Route::prefix('admin')->group(function (){
        Route::get('/login', [AdminController::class, 'login'])->name('admin_login');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin_logout');
        Route::post('/login-submit', [AdminController::class, 'login_submit'])->name('admin_login_submit');
        });


/////////////////////////////////////////////////////////////////




///////////////////////////////////////////////

Route::middleware('auth:professeur')->group(function (){
    Route::get('professeur/dashboard', [ProfesseurController::class, 'dashboard'])->name('professeur_dashboard');
    });

    Route::prefix('professeur')->group(function (){
        Route::get('/login', [ProfesseurController::class, 'login'])->name('professeur_login');
        Route::get('/logout', [ProfesseurController::class, 'logout'])->name('professeur_logout');
        Route::post('/login-submit', [ProfesseurController::class, 'login_submit'])->name('professeur_login_submit');
        });


/////////////////////////////////////////////////////////////////


///////////////////////////////////////////////

Route::middleware('auth:etudiant')->group(function (){
    Route::get('etudiant/dashboard', [EtudiantController::class, 'dashboard'])->name('etudiant_dashboard');
    });

    Route::prefix('etudiant')->group(function (){
        Route::get('/login', [EtudiantController::class, 'login'])->name('etudiant_login');
        Route::get('/logout', [EtudiantController::class, 'logout'])->name('etudiant_logout');
        Route::post('/login-submit', [EtudiantController::class, 'login_submit'])->name('etudiant_login_submit');
        });


/////////////////////////////////////////////////////////////////

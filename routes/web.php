<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\RouteViewController;
use Illuminate\Support\Facades\Route;





// les routes d'accès au formulaire de connexion
Route::get('/', [RouteViewController::class, 'loginView'])->name('login');
Route::get('/login', [RouteViewController::class, 'loginView'])->name('login');


// les routes d'accès au formulaire d'inscription
Route::get('/admins/registration', [RouteViewController::class, 'registrationView'])->name('registration');


 Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

    Route::get('/dashboardAdmin', function () {
        return view('dashboardAdmin');
    })->name('dashboard');

    Route::get('/users/dashboardUser', function () {
        return view('/users/dashboardUser');
    })->name('userdashboard');
});




// les routes pour le traitement des données des  formulaires d'authentification
Route::post('/admins/login', [AdminAuthController::class, 'login'])->name('login.process');
Route::post('/admins/registration', [AdminAuthController::class, 'registration'])->name('registration.process');


Route::resource('/users', AdminAuthController::class);
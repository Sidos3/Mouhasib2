<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BilanController;
use App\Http\Controllers\ComptableController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes (if needed)
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Reset Routes (if needed)
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Email Verification Routes (if needed)
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

// Admin Routes
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Fournisseur Routes
Route::group(['middleware' => ['auth', 'fournisseur']], function () {
    Route::get('/fournisseur', [FournisseurController::class, 'index'])->name('fournisseur.dashboard');
});

// Comptable Routes
Route::group(['middleware' => ['auth', 'comptable']], function () {
    Route::get('/comptable', [ComptableController::class, 'index'])->name('comptable.dashboard');
});

// Superadmin Routes
Route::group(['middleware' => ['auth', 'superadmin']], function () {
    Route::get('/superadmin', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::get('/our-service', [ServiceController::class, 'index'])->name('OurService');
Route::get('/AdminService', [ServiceController::class, 'ServiceAdmin'])->name('ServiceAdmin');
Route::get('/FournisseurService', [ServiceController::class, 'ServiceFournisseur'])->name('ServiceFournisseur');
Route::post('/FournisseurService', [FournisseurController::class, 'create'])->name('create_fournisseure');
Route::post('/AdminService', [BilanController::class, 'create_bilan'])->name('create_bilan');

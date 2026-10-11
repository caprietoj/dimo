<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PracticeAreaController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - DIMO Law Firm
|--------------------------------------------------------------------------
*/

// Public Multi-Page Website
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/nuestra-firma', [HomeController::class, 'about'])->name('about');
Route::get('/estrategias-y-soluciones', [HomeController::class, 'services'])->name('services');
Route::get('/consultoria-alto-nivel', [HomeController::class, 'contact'])->name('contact');
Route::post('/contacto', [HomeController::class, 'contactSubmit'])->name('contact.submit');

// Authentication for AdminLTE
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// AdminLTE Management Panel
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Contact Inquiries Management
    Route::get('/mensajes', [ContactMessageController::class, 'index'])->name('messages.index');
    Route::get('/mensajes/{message}', [ContactMessageController::class, 'show'])->name('messages.show');
    Route::patch('/mensajes/{message}/estado', [ContactMessageController::class, 'updateStatus'])->name('messages.status');
    Route::delete('/mensajes/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');

    // Practice Areas CRUD
    Route::resource('practice-areas', PracticeAreaController::class)
        ->parameters(['practice-areas' => 'practiceArea'])
        ->names('practice-areas');

    // Team Members CRUD
    Route::resource('team', TeamMemberController::class)
        ->parameters(['team' => 'teamMember'])
        ->names('team');

    // Firm Settings
    Route::get('/configuracion', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/configuracion', [SettingController::class, 'update'])->name('settings.update');

    // Users and Roles Management
    Route::patch('/users/{user}/password', [UserController::class, 'updatePassword'])->name('users.password');
    Route::resource('users', UserController::class)->names('users');
    Route::resource('roles', RoleController::class)->except(['show'])->names('roles');
});

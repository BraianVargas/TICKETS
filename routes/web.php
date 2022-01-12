<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;


Route::get('/', function () {
    return view('layout.base');
})->middleware('auth') -> name('home');

// route get for the login page
Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

// Logout route
Route::get('/logout',[SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Post Logout Route
Route::post('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin');

Route::get('/user', [UserController::class, 'index'])
    ->middleware('auth.user')
    ->name('user');

Route::get('/create_ticket', [TicketController::class, 'create'])
    ->middleware('auth.user')
    ->name('create-ticket');

Route::post('/create_ticket', [TicketController::class, 'store'])
    ->middleware('auth.user')
    ->name('create-ticket');

Route::get('/searchUserByDni', [TicketController::class, 'searchUser'])
    ->middleware('auth.user')
    ->name('searchUser');

Route::get('/searchUserByDni', [TicketController::class, 'PostSearchUser'])
    ->middleware('auth.user')
    ->name('searchUser');

Route::get('/ver-tickets', [TicketController::class, 'show'])
    ->middleware('auth.user')
    ->name('viewTicket');

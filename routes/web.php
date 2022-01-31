<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CallersController;



Route::get('/', function () {
    return view('layout.base');
})->middleware('auth') -> name('home');

// route get for the login page
Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');


//  **** REGISTER ****
Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');
Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');


// Logout route
Route::get('/logout',[SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
Route::post('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// **** ADMIN ROUTES **** 
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin');


// **** USER ROUTES ****
// INDEX
Route::get('/user', [UserController::class, 'index'])
    ->middleware('auth')
    ->name('user');


// **** CREATE TICKET
Route::get('/create_ticket', [TicketController::class, 'create'])
    ->middleware('auth.user')
    ->name('create-ticket');
Route::post('/create_ticket', [TicketController::class, 'store'])
    ->middleware('auth.user')
    ->name('create-ticket');

// ****  SEARCHES ROUTES ****
Route::get('/searchUserByDni', [TicketController::class, 'searchUser'])
    ->middleware('auth.user')
    ->name('searchUser');

Route::post('/searchUserByDni', [TicketController::class, 'PostSearchUser'])
    ->middleware('auth.user')
    ->name('searchUser');
    
Route::get('/search-ticket/byDNI', [TicketController::class, 'searchTicketByDni'])
    ->middleware('auth.user')
    ->name('searchTicketByDni');

Route::post('/search-ticket/byDNI', [TicketController::class, 'postSearchTicketByDni'])
    ->middleware('auth.user')
    ->name('searchTicketByDni');



Route::get('/ver-tickets', [TicketController::class, 'show'])
    ->middleware('auth.user')
    ->name('viewTicket');

Route::get('/ver-tickets/{dni}', [TicketController::class, 'showWithDni'])
    ->middleware('auth.user')
    ->name('viewTicketWithId');

Route::get('/tickets', [TicketController::class, 'index'])
    ->middleware('auth.user')
    ->name('tickets');


// **** CALLERS ROUTES ****
Route::get('/clientes', [CallersController::class, 'index'])
    ->middleware('auth.user')
    ->name('clientes');

Route::get('/create-client', [CallersController::class, 'create'])
    ->middleware('auth.user')
    ->name('create_client');

Route::post('/create-client', [CallersController::class, 'create_new'])
    ->middleware('auth.user')
    ->name('create_client');

Route::get('/search-ticket/byId', [TicketController::class, 'searchTicketById'])
    ->middleware('auth.user')
    ->name('searchTicketById');

Route::post('/search-ticket/byId', [TicketController::class, 'postSearchTicketById'])
    ->middleware('auth.user')
    ->name('searchTicketById');

Route::get('/editTicket/{id}', [TicketController::class, 'editTicket'])
    ->middleware('auth.user')
    ->name('editTicket');

Route::post('/editTicket/{id}', [TicketController::class, 'postEditTicket'])
    ->middleware('auth.user')
    ->name('editTicket');

Route::get('/editTicket/close/{id}', [TicketController::class, 'closeTicket'])
    ->middleware('auth.user')
    ->name('closeTicket');

Route::post('/editTicket/{id}', [TicketController::class, 'closeTicket'])
    ->middleware('auth.user')
    ->name('closeTicket');
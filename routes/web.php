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
Route::get('/admin/reports', [AdminController::class, 'reports'])
    ->middleware('auth.admin')
    ->name('admin.reports');
// **** END ADMIN ROUTES **** 



    
Route::middleware(['auth'])->group(function (){
Route::middleware(['auth.admin'])->group(function (){
// **** USER ROUTES ****
// INDEX
Route::get('/user', [UserController::class, 'index'])
    ->name('user');

// **** CREATE TICKET
Route::get('/create_ticket', [TicketController::class, 'create'])
    ->name('create-ticket');
Route::post('/create_ticket', [TicketController::class, 'store'])
    ->name('create-ticket');
Route::get('/create_ticket/{id}', [TicketController::class, 'newTicket'])
    ->name('newTicket');

// ****  SEARCHES ROUTES ****
Route::get('/searchUserByDni', [TicketController::class, 'searchUser'])
    ->name('searchUser');

Route::post('/searchUserByDni', [TicketController::class, 'PostSearchUser'])
    ->name('searchUser');
    
Route::get('/search-ticket/byDNI', [TicketController::class, 'searchTicketByDni'])
    ->name('searchTicketByDni');

Route::post('/search-ticket/byDNI', [TicketController::class, 'postSearchTicketByDni'])
    ->name('searchTicketByDni');

Route::get('/search-ticket/byId', [TicketController::class, 'searchTicketById'])
    ->name('searchTicketById');

Route::post('/search-ticket/byId', [TicketController::class, 'postSearchTicketById'])
    ->name('searchTicketById');




    Route::get('/ver-tickets', [TicketController::class, 'show'])
        ->name('viewTicket');
    Route::get('/ver-tickets/{dni}', [TicketController::class, 'showWithDni'])
        ->name('viewTicketWithId');
    Route::get('/tickets', [TicketController::class, 'index'])
        ->name('tickets');



// **** CALLERS ROUTES ****
Route::get('/clientes', [CallersController::class, 'index'])
    ->name('clientes');

Route::get('/create-client', [CallersController::class, 'create'])
    ->name('create_client');

Route::post('/create-client', [CallersController::class, 'create_new'])
    ->name('create_client');
Route::get('/showClients', [CallersController::class, 'show'])
    ->name('callers.show');

Route::get('/searchByDni', [CallersController::class, 'searchCallerByDni'])
    ->name('callers.searchByDni');
Route::post('/searchByDni', [CallersController::class, 'postSearchByDni'])
    ->name('callers.searchByDni');

Route::get('/searchById', [CallersController::class, 'searchCallerById'])
    ->name('callers.searchById');
Route::post('/searchById', [CallersController::class, 'postSearchCallerById'])
    ->name('callers.searchById');

Route::get('/edit/{id}', [CallersController::class, 'edit'])
    ->name('callers.editUser');
Route::post('/edit/{id}', [CallersController::class, 'postEdit'])
    ->name('callers.editUser');







Route::get('/editTicket/{id}', [TicketController::class, 'editTicket'])
    ->name('editTicket');

Route::post('/editTicket/{id}', [TicketController::class, 'postEditTicket'])
    ->name('editTicket');
    
//  **** ROUTES FOR CLIENTS ****

Route::get('/client', [CallersController::class, 'index'])
    ->name('client.index');

Route::get('/client/create', [CallersController::class, 'create'])
    ->name('client.create');



});
});

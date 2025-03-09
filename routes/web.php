<?php

use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HighchartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LockscreenController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Clients\ClientController;
use App\Http\Controllers\Clients\Booking\BookingController;
use App\Http\Controllers\Admins\Car\CarController;
use App\Http\Controllers\Admins\Reservation\ReservationAdController;
use App\Http\Controllers\Managers\Voiture\VoitureController;
use App\Http\Controllers\Managers\Reservation\ReservationController;
use App\Http\Controllers\Managers\ManagerController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/login');

Route::get('/accueil', 'WelcomeController@welcome');

//visitor
Route::group(['middleware' => 'visitors'], function () {

    Route::get('/login',                      [LoginController::class, 'login']);
    Route::post('/login',                     [LoginController::class, 'postLogin']);

    Route::get('/register',                   [RegistrationController::class, 'register']);
    Route::post('/register',                  [RegistrationController::class, 'postRegister']);

    Route::get('/forgot-password',            [ForgotPasswordController::class, 'forgotPassword']);
    Route::post('/forgot-password',           [ForgotPasswordController::class, 'PostForgotPassword']);
    Route::get('/reset/{email}/{resetCode}',  [ForgotPasswordController::class, 'resetPassword']);
    Route::post('/reset/{email}/{resetCode}', [ForgotPasswordController::class, 'postResetPassword']);
});

Route::post('/logout', [LoginController::class, 'logout']);


//route admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('users', 'Admins\User\UserController');

    Route::get('/dashboard',        [AdminController::class, 'getdash']);
    Route::get('/managers',         [AdminController::class, 'getmanagers']);
    Route::get('/clients',          [AdminController::class, 'getclients']);
    Route::put('/activate/{id}',    [AdminController::class, 'Activate']);
    Route::put('/desactivate/{id}', [AdminController::class, 'Desactivate']);

    //voiture
    Route::get('/cars',             [CarController::class, 'index']);
    Route::post('/cars',            [CarController::class, 'store']);
    Route::get('/cars/{id}',        [CarController::class, 'show']);
    Route::get('/cars/{id}/edit',   [CarController::class, 'edit']);
    Route::put('/cars/{id}',        [CarController::class, 'update']);
    Route::delete('/cars/{id}',     [CarController::class, 'destroy']);
    Route::put('/dispo/{id}',       [CarController::class, 'dispo']);
    Route::put('/nonDispo/{id}',    [CarController::class, 'nonDispo']);

    //reservation
    Route::get('/reservations/create',  [ReservationAdController::class, 'create']);
    Route::get('/reservations',         [ReservationAdController::class, 'index']);
    Route::post('/reservations',        [ReservationAdController::class, 'store']); //->name('reservations.store');
    Route::get('/reservations/{id}',    [ReservationAdController::class, 'show']);
    Route::put('/confirmReserv/{id}',   [ReservationAdController::class, 'confirmReserv']);
    Route::put('/cancelReserv/{id}',    [ReservationAdController::class, 'cancelReserv']);

    Route::get('/statistic',   [HighchartController::class, 'handleStat']);
});


// route manager
Route::group(['prefix' => 'manager', 'middleware' => 'manager'], function () {

    Route::get('/dashboard',            [ManagerController::class, 'getdash']);

    Route::get('/reservations/create',  [ReservationController::class, 'create']);
    Route::get('/reservations',         [ReservationController::class, 'index']);
    Route::post('/reservations',        [ReservationController::class, 'store']); //->name('reservations.store');
    Route::get('/reservations/{id}',    [ReservationController::class, 'show']);
    Route::put('/confirmReserv/{id}',   [ReservationController::class, 'confirmReserv']);
    Route::put('/cancelReserv/{id}',    [ReservationController::class, 'cancelReserv']);

    //Voiture
    Route::resource('voitures', 'Managers\Voiture\VoitureController');
    Route::put('/dispo/{id}',           [VoitureController::class, 'dispo']);
    Route::put('/nonDispo/{id}',        [VoitureController::class, 'nonDispo']);

    //invoices
    Route::resource('invoices', 'InvoiceController');
    Route::post('invoice_add/delete', 'InvoiceController@InvoiceAddDelete')->name('invoice_add/delete');
    Route::post('invoice/delete', 'InvoiceController@InvoiceDelete')->name('invoice/delete');
    Route::post('create/invoices/update', 'InvoiceController@InvoiceUpdate')->name('create/invoices/update');
});

//route client
Route::group(['prefix' => 'client', 'middleware' => 'client'], function () {

    Route::resource('bookings', 'Clients\Booking\BookingController')->except('create');
    Route::get('bookings/create/{id}', [BookingController::class, 'create']);

    Route::get('/dashboard',           [ClientController::class, 'dashboard']);
    Route::get('/voitures',            [ClientController::class, 'getvoitures']);
    Route::get('/history',             [ClientController::class, 'getHistory']);
});


Route::get('/account/settings',      [AccountController::class, 'settings']);
Route::get('/account/profil',        [AccountController::class, 'profil']);
Route::post('/account/settings',     [AccountController::class, 'updateProfil']);
Route::post('/account/settings/pwd', [AccountController::class, 'updatePassword']);

Route::get('/account/lock', 'LockscreenController@lockScreen')->name('lockscreen');
Route::post('/account/lock', [LockscreenController::class, 'postLockscreen']);

Route::get('/activate/{email}/{activationCode}', [ActivationController::class, 'activate']);

Route::get('/activities',    [ActivitiesController::class, 'activitie']);
Route::post('/mark-as-read', [ActivitiesController::class, 'markNotification'])->name('markNotification');

Route::get('/search', 'SearchController@search')->name('search');

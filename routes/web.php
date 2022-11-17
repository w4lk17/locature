<?php

use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Admins\Car\CarController;
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

Route::get('/', 'WelcomeController@welcome');

Route::group(['middleware' => 'visitors'], function () {
    Route::get('/register', 'RegistrationController@register');
    Route::post('/register', 'RegistrationController@postRegister');

    Route::get('/login', 'LoginController@login');
    Route::post('/login', 'LoginController@postLogin');

    Route::get('/forgot-password', 'ForgotPasswordController@forgotPassword');
    Route::post('/forgot-password', 'ForgotPasswordController@PostForgotPassword');

    Route::get('/reset/{email}/{resetCode}', 'ForgotPasswordController@resetPassword');
    Route::post('/reset/{email}/{resetCode}', 'ForgotPasswordController@postResetPassword');
});

Route::post('/logout', 'LoginController@logout');


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
});


// route manager
Route::group(['prefix' => 'manager', 'middleware' => 'manager'], function () {

    Route::get('/dashboard', 'Managers\ManagerController@getdash');
    Route::get('/reservations/create', 'Managers\Reservation\ReservationController@create');
    Route::get('/reservations', 'Managers\Reservation\ReservationController@index');
    Route::post('/reservations', 'Managers\Reservation\ReservationController@store')->name('reservations.store');
    Route::get('/reservations/{id}', 'Managers\Reservation\ReservationController@show');
    Route::put('/confirmReserv/{id}', 'Managers\Reservation\ReservationController@confirmReserv');
    Route::put('/cancelReserv/{id}', 'Managers\Reservation\ReservationController@cancelReserv');

    //Voiture
    Route::resource('voitures', 'Managers\Voiture\VoitureController');
    Route::put('/dispo/{id}', 'Managers\Voiture\VoitureController@dispo');
    Route::put('/nonDispo/{id}', 'Managers\Voiture\VoitureController@nonDispo');

    //invoices
    Route::resource('invoices', 'InvoiceController');
    Route::post('invoice_add/delete', 'InvoiceController@InvoiceAddDelete')->name('invoice_add/delete');
    Route::post('invoice/delete', 'InvoiceController@InvoiceDelete')->name('invoice/delete');
    Route::post('create/invoices/update', 'InvoiceController@InvoiceUpdate')->name('create/invoices/update');
});

//route client
Route::group(['prefix' => 'client', 'middleware' => 'client'], function () {
    Route::get('/dashboard', 'Clients\ClientController@dashboard');
    Route::get('/voitures', 'Clients\ClientController@getvoitures');
    Route::get('/history', 'Clients\ClientController@getHistory');

    Route::get('bookings/create/{id}', 'Clients\Booking\BookingController@create');
    Route::resource('bookings', 'Clients\Booking\BookingController')->except('create');
});

Route::get('/account/settings', 'AccountController@settings');
Route::get('/account/profil', 'AccountController@profil');
Route::post('/account/settings', 'AccountController@updateProfil');
Route::post('/account/settings/pwd', 'AccountController@updatePassword');
Route::get('/account/lock', 'LockscreenController@lockScreen')->name('lockscreen');
Route::post('/account/lock', 'LockscreenController@postLockscreen');

Route::get('/activate/{email}/{activationCode}', 'ActivationController@activate');

Route::get('/userChartData', 'ChartDataController@getMonthlyUserData');
Route::get('/reservChartData', 'ChartDataController@getMonthlyReservData');
Route::get('/search', 'SearchController@search')->name('search');

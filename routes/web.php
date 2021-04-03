<?php

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

Route::group(['middleware' => 'visitors'],function(){
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
Route::group(['prefix' => 'admin', 'middleware' => 'admin'],function(){
    Route::resource('users', 'Admins\User\UserController');
    Route::get('/managers', 'ListeController@getmanager');
    Route::get('/clients', 'ListeController@getclient');
});


 // route manager
Route::group(['prefix' => 'manager', 'middleware' => 'manager'],function(){
    Route::resource('voitures', 'Managers\Voiture\VoitureController');
    Route::get('/dashboard', 'Managers\Voiture\VoitureController@getdash');

        //a revoir
    //Route::get('reservations/create/{id}', 'Clients\Booking\ReservationController@create');
    //Route::resource('reservations', 'Clients\Booking\ReservationController')->except('create');
});


 //route client
Route::group([ 'middleware' => 'client'],function(){
    Route::get('/accueil', 'Clients\ClientController@dashboard');

    //Route::get('/reservations', 'Clients\ClientController@index');
    //Route::get('/reservations/create/{id}', 'Clients\ClientController@create');

    Route::get('bookings/create/{id}', 'Clients\Booking\BookingController@create');
    Route::resource('bookings', 'Clients\Booking\BookingController')->except('create');
});

Route::get('/account/settings', 'AccountController@settings');
Route::post('/account/settings', 'AccountController@updateProfil');
Route::post('/account/settings/pwd', 'AccountController@updatePassword');
Route::get('/account/lock', 'LockscreenController@lockScreen')->name('lockscreen');
Route::post('/account/lock', 'LockscreenController@postLockscreen');

Route::get('/activate/{email}/{activationCode}', 'ActivationController@activate');

//Route::get('admin/dashboard', 'Admins\AdminController@dashboard')->middleware('admin');
//Route::get('/manager/dashboard', 'Managers\ManagerController@dashboard')->middleware('manager');

Route::get('/userChartData', 'ChartDataController@getMonthlyUserData');

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

Route::get('/', function () {
    return view('welcome');
});

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
});


Route::get('/account/profil', 'AccountController@profil');

Route::get('/accueil', 'Clients\ClientController@dashboard')->middleware('client');

Route::get('/activate/{email}/{activationCode}', 'ActivationController@activate');

//Route::get('/statistic', 'Managers\ManagerController@stats');



//Route::get('admin/dashboard', 'Admins\AdminController@dashboard')->middleware('admin');
//Route::get('/manager/dashboard', 'Managers\ManagerController@dashboard')->middleware('manager');

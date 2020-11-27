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

    /*************************************
    *           Adminer Route           *
    ************************************/
    Route::any('adminer', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index');
    /*************************************
    *           End Adminer Route       *
    ************************************/


Route::prefix('Admin_CP')->namespace('Admin')->group(function () {
    Route::get('/adminlogin', 'AdminLoginController@AdminLogin')->name('Adminlogin');
    Route::post('/adminlogin', 'AdminLoginController@Login');
    Route::get('/logout', 'AdminLoginController@LogoutAdmin');



    Route::middleware('admin:admin')->group(function () {

        Route::middleware('role:admin')->group(function () {
            /*************************************
             *           Main Route              *
             ************************************/
            Route::get('/{any}', function () {
                return view('Admin.dashboard');
            })->where(['any' => 'allRegions|allCities|allDistricts|allOrders']);
            /*************************************
             *          End Main Route           *
             ************************************/

            /*************************************
             *           Regions Route           *
             ************************************/
            Route::resource('/region', 'RegionController');
            /*************************************
             *           End Regions Route       *
             ************************************/
            /*************************************
             *           City Route           *
             ************************************/
            Route::resource('/city', 'CityController');
            /*************************************
             *           End City Route       *
             ************************************/
            /*************************************
             *           District Route           *
             ************************************/
            Route::resource('/district', 'DistrictController');
            /*************************************
             *           End District Route       *
             ************************************/
            /*************************************
             *           Kosor Route           *
             ************************************/
            Route::resource('/kosor', 'KosorController')->except('create');
            /*************************************
             *           End Kosor Route           *
             ************************************/

            /*************************************
             *           Customer                *
             ************************************/
            Route::resource('/customer', 'CustomerController');
            /*************************************
             *           End Customer            *
             ************************************/
        });
//        Route::get('/{any}', function () {
//            return view('Admin.dashboard');
//        })->where(['any' => 'allOrders']);
        /*************************************
         *           Order Route           *
         ************************************/
        Route::resource('/order', 'OrderController');
        /*************************************
         *           End Order Route           *
         ************************************/
        /*************************************
         *           Profile Route           *
         ************************************/
        Route::get('/dashboard', 'DashBoardController@index');
        Route::get('/profile', 'DashBoardController@Profile');
        Route::get('/details', 'DashBoardController@Details');
        Route::post('/changePass/{id}', 'DashBoardController@ChangePass');
        /*************************************
         *          End Profile Route           *
         ************************************/
        /*************************************
         *           Kosor Route           *
         ************************************/
        Route::resource('/kosor', 'KosorController')->only('update','edit');
        /*************************************
         *           End Kosor Route           *
         ************************************/
        Route::resource('/kosorImage', 'KosorImageController')->only('store','destroy');
        /*************************************
         *           End Kosor Route       *
         ************************************/
        /*************************************
         *           Halls Route           *
         ************************************/
        Route::resource('/menHalls', 'MenHallsController')->except('create','edit') ;
        Route::resource('/womenHalls', 'WomenHallsController')->except('edit','create');
        /*************************************
         *           End Halls Route        *
         ************************************/

    });



});


<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



    /**************
    /*******RegionController*******
    **************/
    Route::get('/getregions', 'Api\RegionController@GetRegions');
    Route::get('/getcities/{id}', 'Api\RegionController@GetCities');
    Route::get('/getdistrict/{id}', 'Api\RegionController@GetDistrict');
    /**************
    /******* End RegionController*******
     **************/

    /**************
    /******* KosorController*******
     **************/
    Route::get('/getall/{id}', 'Api\KosorController@GetAll');
    Route::get('/getsingle/{id}', 'Api\KosorController@GetSingle');
    Route::get('/getbooking/{id}', 'Api\KosorController@GetBooking');
    Route::post('/booking', 'Api\KosorController@Booking');

/**************
/******* End KosorController*******
 **************/
/******* UserController*******
 **************/
Route::post('/register', 'Api\UserController@Register');
Route::post('/login', 'Api\UserController@Login');
Route::post('/verification_code/{id}/{code}', 'Api\UserController@VerificationCode');


/**************
/******* Authenticated routes*******
 **************/

//Route::get('/bookings/{id}', 'Api\UserController@Booking');

Route::group(['middleware'=>['jwt.auth']], function (){
    Route::post('/saveOrder', 'Api\UserController@SaveOrder');
    Route::get('/bookings', 'Api\UserController@Booking');
    Route::get('/details/{id}', 'Api\UserController@BookingDetails');
    Route::post('/review', 'Api\UserController@Review');
    Route::post('/madaPayment', 'Api\UserController@MadaPayment');
});


/**************
/******* End UserController*******
 **************/

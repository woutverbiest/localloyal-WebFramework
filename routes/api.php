<?php

use Illuminate\Http\Request;

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


Route::post('/login','API\UserController@login');
Route::post('/register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){

    //get information about my account
    Route::post('/user/details', 'API\UserController@details');

    //update information about my account
    Route::post('/user/update','API\UserController@update');//TODO

    //create shop
    Route::post('/shop/create','API\ShopController@create');

    //get shop
    Route::post('/shop','API\ShopController@index');

    //update shop
    Route::post('/shop/update','API\ShopController@update');

    //create Reward
    Route::post('/rewards/{shopuuid}/create','API\RewardController@create');

    //update Reward
    Route::post('/rewards/{shopuuid}/{rewarduuid}','API\RewardController@update');//TODO

    //delete Reward
    Route::post('/rewards/{shopuuid}/{rewarduuid}/delete','API\RewardController@delete');//TODO

    //get transactions of my shop
    Route::post('/transactions','API\TransactionController@index');

    //update openinghours of my shop
    Route::post('/shop/{shopuuid}/openinghours','API\OpeninghoursController@update');

    //TODO CREATE ROUTES FOR STATISTICS
});


//get a client
Route::get('/user/{uuid}','API\UserController@find');

//get rewards of shop
Route::get('/rewards/{shopuuid}','API\RewardController@index');

//get openinghours of shop
Route::get('/shop/{shopuuid}/openinghours','API\OpeninghoursController@index');



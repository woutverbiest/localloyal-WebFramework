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
    Route::get('/user', 'API\UserController@details');//get my account
    Route::post('/user','API\UserController@update');//update my account
    Route::post('/user/password','API\UserController@updatepassword');//update password

    Route::get('/shop','API\ShopController@myshop');//get my shop
    Route::post('/shop','API\ShopController@update');//update shop
    Route::post('/shop/create','API\ShopController@create');//create shop

    Route::post('/reward','API\RewardController@create');//create Reward
    Route::post('/reward/{rewarduuid}','API\RewardController@update');//update Reward
    Route::delete('/reward/{rewarduuid}','API\RewardController@delete');//delete Reward

    Route::get('/transactions','API\TransactionController@index');//get transactions of my shop

    Route::get('/statistics','API\TransactionController@statistics');//get statistics of my shop

    Route::post('/openinghours','API\OpeninghoursController@update');//update openinghours of my shop
});

Route::get('/user/{uuid}','API\UserController@find');//get a user

Route::get('/shop/all','API\ShopController@index');//get all shoptypes
Route::get('/shop/{shopuuid}','API\ShopController@find');//get a shop by id
Route::get('/shop/{shopuuid}/rewards','API\RewardController@index');//get rewards of shop
Route::get('/shop/{shopuuid}/openinghours','API\OpeninghoursController@index');//get openinghours of shop

Route::get('/reward/{rewarduuid}','API\RewardController@find');//get a reward by id

//TODO FIND SOMETHING for routes that are not found

<?php

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

//use LucaDegasperi\OAuth2Server\Authorizer;

$api =app('Dingo\Api\Routing\Router');

Route::get('/', function () {
    return view('welcome');
});

$api->version('v1',function($api) {
    $api->post('oauth/access_token', function() {
        return Response::json(Authorizer::issueAccessToken());
    });
});

//$api->version('v1',function($api){
//    $api->get('/','App\Http\Controllers\HomeController@index');
//    $api->get('users/{user_id}/roles/{role_name}','App\Http\Controllers\HomeController@attachUserRole');
//    $api->get('users/{user_id}','App\Http\Controllers\HomeController@getUserRole');
//    $api->post('role/permission/add','App\Http\Controllers\HomeController@attachPermissions');
//    $api->get('role/{roles}/permissions','App\Http\Controllers\HomeController@getPermissions');
//    $api->post('authenticate','App\Http\Controllers\Auth\RegisterController@authenticate');
//
//});

$api->version('v1', ['middleware' => 'api.auth'], function ($api) {

$api->get('user/validate', 'App\Http\Controllers\UserController@validateUser');
    //    $api->get('users','App\Http\Controllers\Auth\RegisterController@index');
//    $api->get('user','App\Http\Controllers\Auth\RegisterController@show');
//    $api->get('token','App\Http\Controllers\Auth\RegisterController@getUserToken');
});
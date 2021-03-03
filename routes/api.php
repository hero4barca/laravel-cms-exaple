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

Route::apiResource('companies', 'App\Http\Controllers\CompanyController');

Route::apiResource('employees', 'App\Http\Controllers\EmployeeController');
Route::patch('/employees/{employee}/set_company', 'App\Http\Controllers\EmployeeController@set_company');

Route::apiResources(['users' => 'App\Http\Controllers\UserController'], ['except' => ['delete']]);

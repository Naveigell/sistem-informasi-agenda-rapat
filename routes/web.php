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

// ROUTE SUPERADMIN
Route::group(['prefix' => '/superadmin'], function (){

    Route::get('/agenda', 'Api\SuperAdmin\AgendaController@index');
    Route::get('/agenda/{id}', 'Api\SuperAdmin\AgendaController@detail');

    Route::get('/arsip', function () {
        return view('pages.superadmin.arsip.arsip');
    });
});

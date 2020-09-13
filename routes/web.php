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

    Route::get('/agenda', 'Api\SuperAdmin\AgendaController@showView');
    Route::get('/agenda/insert', 'Api\SuperAdmin\AgendaController@insertView');
    Route::get('/agenda/{id}', 'Api\SuperAdmin\AgendaController@detailView');
    Route::get('/agenda/{id}/edit', 'Api\SuperAdmin\AgendaController@editView');

    Route::get('/profile', 'Api\SuperAdmin\ProfileController@showView');

    Route::get('/arsip', function () {
        return view('pages.superadmin.arsip.arsip');
    });
});

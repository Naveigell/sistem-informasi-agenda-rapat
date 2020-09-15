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

    Route::get('/login', function (){
        return view('login');
    });

    Route::get('/agenda', 'Api\SuperAdmin\AgendaController@showView');
    Route::get('/agenda/insert', 'Api\SuperAdmin\AgendaController@insertView');
    Route::get('/agenda/{id}', 'Api\SuperAdmin\AgendaController@detailView');
    Route::get('/agenda/{id}/edit', 'Api\SuperAdmin\AgendaController@editView');

    Route::get('/anggota', 'Api\SuperAdmin\AnggotaController@showView');
    Route::get('/anggota/insert', 'Api\SuperAdmin\AnggotaController@insertView');
    Route::get('/anggota/{id}', 'Api\SuperAdmin\AnggotaController@detailView');
    Route::get('/anggota/{id}/edit', 'Api\SuperAdmin\AnggotaController@editView');

    Route::get('/profile', 'Api\SuperAdmin\ProfileController@showView');

    Route::get('/pengaturan', 'Api\SuperAdmin\SettingController@showView');

    Route::get('/arsip', function () {
        return view('pages.superadmin.arsip.arsip');
    });
});

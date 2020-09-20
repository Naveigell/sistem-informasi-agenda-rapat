<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function (){
//    var_dump(auth('user')->id());
    return redirect()->to('/superadmin/agenda');
});

Route::get('/superadmin/login', function (){
    return view('login');
});

Route::get('/logout', 'UserController@logout');

// API ROUTE
Route::group(['prefix' => '/api'], function (){
    Route::post('/login', 'UserController@login');
});

// ROUTE SUPERADMIN
Route::group(['prefix' => '/superadmin', 'middleware' => 'user'], function (){

    Route::get('/surat', 'Api\SuperAdmin\SuratController@showView');
    Route::get('/surat/insert', 'Api\SuperAdmin\SuratController@insertView');
    Route::get('/surat/{id}', 'Api\SuperAdmin\SuratController@detailView');
    Route::get('/surat/{id}/edit', 'Api\SuperAdmin\SuratController@editView');

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

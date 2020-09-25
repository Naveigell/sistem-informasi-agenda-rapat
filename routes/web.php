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

    Route::post('/superadmin/agenda/insert', 'Api\SuperAdmin\AgendaController@insert');
    Route::post('/superadmin/agenda/update', 'Api\SuperAdmin\AgendaController@update');

    Route::post('/superadmin/anggota/insert', 'Api\SuperAdmin\AnggotaController@insert');
    Route::post('/superadmin/anggota/pimpinan/update', 'Api\SuperAdmin\Anggota\PimpinanController@update');
    Route::post('/superadmin/anggota/pimpinan/delete', 'Api\SuperAdmin\Anggota\PimpinanController@delete');

    Route::post('/superadmin/profile/update', 'Api\SuperAdmin\ProfileController@updateBiodata');
    Route::post('/superadmin/profile/password/update', 'Api\SuperAdmin\ProfileController@updatePassword');

    Route::post('/superadmin/surat/update', 'Api\SuperAdmin\SuratController@update');
    Route::post('/superadmin/surat/delete', 'Api\SuperAdmin\SuratController@delete');

    Route::get('/superadmin/peserta/{id}', 'Api\SuperAdmin\PesertaController@getAt');
    Route::post('/superadmin/peserta/update', 'Api\SuperAdmin\PesertaController@update');
    Route::post('/superadmin/peserta/delete', 'Api\SuperAdmin\PesertaController@delete');
    Route::post('/superadmin/peserta/insert', 'Api\SuperAdmin\PesertaController@insert');
});

// ROUTE SUPERADMIN
Route::group(['prefix' => '/superadmin', 'middleware' => 'user'], function (){

    Route::get('/surat', 'Api\SuperAdmin\SuratController@showView');
    Route::get('/surat/insert', 'Api\SuperAdmin\SuratController@insertView');
    Route::get('/surat/{id}', 'Api\SuperAdmin\SuratController@detailView');
    Route::get('/surat/{id}/edit', 'Api\SuperAdmin\SuratController@editView');

    Route::get('/agenda', 'Api\SuperAdmin\AgendaController@showView')->middleware('remove.cache');
    Route::get('/agenda/insert', 'Api\SuperAdmin\AgendaController@insertView');
    Route::get('/agenda/{id}', 'Api\SuperAdmin\AgendaController@detailView');
    Route::get('/agenda/{id}/edit', 'Api\SuperAdmin\AgendaController@editView');

    Route::get('/anggota', 'Api\SuperAdmin\AnggotaController@showView');
    Route::get('/anggota/insert', 'Api\SuperAdmin\AnggotaController@insertView')->middleware('remove.cache');

    Route::get('/anggota/pimpinan', 'Api\SuperAdmin\Anggota\PimpinanController@showView');
    Route::get('/anggota/pimpinan/{id}', 'Api\SuperAdmin\Anggota\PimpinanController@detailView');
    Route::get('/anggota/pimpinan/{id}/edit', 'Api\SuperAdmin\Anggota\PimpinanController@editView');

    Route::get('/profile', 'Api\SuperAdmin\ProfileController@showView');

    Route::get('/pengaturan', 'Api\SuperAdmin\SettingController@showView');

    Route::get('/arsip', function () {
        return view('pages.superadmin.arsip.arsip');
    });
});

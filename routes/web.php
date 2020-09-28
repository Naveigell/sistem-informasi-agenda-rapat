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
    Route::post('/superadmin/agenda/delete', 'Api\SuperAdmin\AgendaController@delete');

    Route::post('/superadmin/anggota/pimpinan/insert', 'Api\SuperAdmin\Anggota\PimpinanController@insert');
    Route::post('/superadmin/anggota/pimpinan/update', 'Api\SuperAdmin\Anggota\PimpinanController@update');
    Route::post('/superadmin/anggota/pimpinan/delete', 'Api\SuperAdmin\Anggota\PimpinanController@delete');

    Route::post('/superadmin/profile/update', 'Api\SuperAdmin\ProfileController@updateBiodata');
    Route::post('/superadmin/profile/password/update', 'Api\SuperAdmin\ProfileController@updatePassword');

    Route::post('/superadmin/anggota/admin/insert', 'Api\SuperAdmin\Anggota\AdminsController@insert');
    Route::post('/superadmin/anggota/admin/update', 'Api\SuperAdmin\Anggota\AdminsController@update');
    Route::post('/superadmin/anggota/admin/delete', 'Api\SuperAdmin\Anggota\AdminsController@delete');

    Route::post('/superadmin/surat/insert', 'Api\SuperAdmin\SuratController@insert');
    Route::post('/superadmin/surat/update', 'Api\SuperAdmin\SuratController@update');
    Route::post('/superadmin/surat/delete', 'Api\SuperAdmin\SuratController@delete');

    Route::get('/superadmin/peserta/{id}', 'Api\SuperAdmin\PesertaController@getAt');
    Route::post('/superadmin/peserta/update', 'Api\SuperAdmin\PesertaController@update');
    Route::post('/superadmin/peserta/delete', 'Api\SuperAdmin\PesertaController@delete');
    Route::post('/superadmin/peserta/insert', 'Api\SuperAdmin\PesertaController@insert');
});

// ROUTE SUPERADMIN
Route::group(['prefix' => '/superadmin', 'middleware' => 'user'], function (){

    Route::get('/surat', 'Api\SuperAdmin\SuratController@showView')->name('surat.index');
    Route::get('/surat/insert', 'Api\SuperAdmin\SuratController@insertView')->name('surat.insert');
    Route::get('/surat/{id}', 'Api\SuperAdmin\SuratController@detailView')->name('surat.detail');
    Route::get('/surat/{id}/edit', 'Api\SuperAdmin\SuratController@editView')->name('surat.edit');

    Route::get('/agenda', 'Api\SuperAdmin\AgendaController@showView')->middleware('remove.cache')->name('agenda.index');
    Route::get('/agenda/insert', 'Api\SuperAdmin\AgendaController@insertView')->name('agenda.insert');
    Route::get('/agenda/{id}', 'Api\SuperAdmin\AgendaController@detailView')->name('agenda.detail');
    Route::get('/agenda/{id}/edit', 'Api\SuperAdmin\AgendaController@editView')->name('agenda.edit');

    Route::get('/anggota', 'Api\SuperAdmin\AnggotaController@showView')->name('anggota.index');

    Route::get('/anggota/pimpinan', 'Api\SuperAdmin\Anggota\PimpinanController@showView')->name('anggota.pimpinan.index');
    Route::get('/anggota/pimpinan/insert', 'Api\SuperAdmin\Anggota\PimpinanController@insertView')->middleware('remove.cache')->name('anggota.pimpinan.insert');
    Route::get('/anggota/pimpinan/{id}', 'Api\SuperAdmin\Anggota\PimpinanController@detailView')->name('anggota.pimpinan.detail');
    Route::get('/anggota/pimpinan/{id}/edit', 'Api\SuperAdmin\Anggota\PimpinanController@editView')->name('anggota.pimpinan.edit');

    Route::get('/anggota/admin', 'Api\SuperAdmin\Anggota\AdminsController@showView')->name('anggota.admin.index');
    Route::get('/anggota/admin/insert', 'Api\SuperAdmin\Anggota\AdminsController@insertView')->name('anggota.admin.insert');
    Route::get('/anggota/admin/{id}/edit', 'Api\SuperAdmin\Anggota\AdminsController@editView')->name('anggota.admin.edit');

    Route::get('/profile', 'Api\SuperAdmin\ProfileController@showView')->name('profile.index');

    Route::get('/pengaturan', 'Api\SuperAdmin\SettingController@showView');

    Route::get('/arsip', function () {
        return view('pages.superadmin.arsip.arsip');
    })->name('arsip.index');
});

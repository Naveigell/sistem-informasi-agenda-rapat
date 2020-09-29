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

Route::get('/', function (){
//    var_dump(auth('user')->id());
    return redirect()->to('/login');
});

Route::get('/login', function (){
    return view('login');
});
Route::post('/api/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');

// API ROUTE
Route::group(['prefix' => '/api/superadmin'], function (){

    Route::post('/agenda/insert', 'Api\SuperAdmin\AgendaController@insert');
    Route::post('/agenda/update', 'Api\SuperAdmin\AgendaController@update');
    Route::post('/agenda/delete', 'Api\SuperAdmin\AgendaController@delete');

    Route::post('/anggota/pimpinan/insert', 'Api\SuperAdmin\Anggota\PimpinanController@insert');
    Route::post('/anggota/pimpinan/update', 'Api\SuperAdmin\Anggota\PimpinanController@update');
    Route::post('/anggota/pimpinan/delete', 'Api\SuperAdmin\Anggota\PimpinanController@delete');

    Route::post('/profile/update', 'Api\SuperAdmin\ProfileController@updateBiodata');
    Route::post('/profile/password/update', 'Api\SuperAdmin\ProfileController@updatePassword');

    Route::post('/anggota/admin/insert', 'Api\SuperAdmin\Anggota\AdminsController@insert');
    Route::post('/anggota/admin/update', 'Api\SuperAdmin\Anggota\AdminsController@update');
    Route::post('/anggota/admin/delete', 'Api\SuperAdmin\Anggota\AdminsController@delete');

    Route::post('/surat/insert', 'Api\SuperAdmin\SuratController@insert');
    Route::post('/surat/update', 'Api\SuperAdmin\SuratController@update');
    Route::post('/surat/delete', 'Api\SuperAdmin\SuratController@delete');

    Route::get('/peserta/{id}', 'Api\SuperAdmin\PesertaController@getAt');
    Route::post('/peserta/update', 'Api\SuperAdmin\PesertaController@update');
    Route::post('/peserta/delete', 'Api\SuperAdmin\PesertaController@delete');
    Route::post('/peserta/insert', 'Api\SuperAdmin\PesertaController@insert');
});


// API ROUTE
Route::group(['prefix' => '/api/admin'], function (){

    Route::post('/agenda/insert', 'Api\Admin\AgendaController@insert');
    Route::post('/agenda/update', 'Api\Admin\AgendaController@update');
    Route::post('/agenda/delete', 'Api\Admin\AgendaController@delete');

    Route::post('/anggota/pimpinan/insert', 'Api\Admin\Anggota\PimpinanController@insert');
    Route::post('/anggota/pimpinan/update', 'Api\Admin\Anggota\PimpinanController@update');
    Route::post('/anggota/pimpinan/delete', 'Api\Admin\Anggota\PimpinanController@delete');

    Route::post('/profile/update', 'Api\Admin\ProfileController@updateBiodata');
    Route::post('/profile/password/update', 'Api\Admin\ProfileController@updatePassword');

    Route::post('/anggota/admin/insert', 'Api\Admin\Anggota\AdminsController@insert');
    Route::post('/anggota/admin/update', 'Api\Admin\Anggota\AdminsController@update');
    Route::post('/anggota/admin/delete', 'Api\Admin\Anggota\AdminsController@delete');

    Route::post('/surat/insert', 'Api\Admin\SuratController@insert');
    Route::post('/surat/update', 'Api\Admin\SuratController@update');
    Route::post('/surat/delete', 'Api\Admin\SuratController@delete');

    Route::get('/peserta/{id}', 'Api\Admin\PesertaController@getAt');
    Route::post('/peserta/update', 'Api\Admin\PesertaController@update');
    Route::post('/peserta/delete', 'Api\Admin\PesertaController@delete');
    Route::post('/peserta/insert', 'Api\Admin\PesertaController@insert');
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
});

// ROUTE ADMIN
Route::group(['prefix' => '/admin', 'middleware' => 'user'], function (){

    Route::get('/agenda', 'Api\Admin\AgendaController@showView')->middleware('remove.cache')->name('agenda.index');
    Route::get('/agenda/insert', 'Api\Admin\AgendaController@insertView')->name('agenda.insert');
    Route::get('/agenda/{id}', 'Api\Admin\AgendaController@detailView')->name('agenda.detail');
    Route::get('/agenda/{id}/edit', 'Api\Admin\AgendaController@editView')->name('agenda.edit');

    Route::get('/anggota/pimpinan', 'Api\Admin\Anggota\PimpinanController@showView')->name('anggota.pimpinan.index');
    Route::get('/anggota/pimpinan/{id}', 'Api\Admin\Anggota\PimpinanController@detailView')->name('anggota.pimpinan.detail');

    Route::get('/surat', 'Api\Admin\SuratController@showView')->name('surat.index');
    Route::get('/surat/{id}', 'Api\Admin\SuratController@detailView')->name('surat.detail');

    Route::get('/anggota/admin', 'Api\Admin\Anggota\AdminsController@showView')->name('anggota.admin.index');

    Route::get('/profile', 'Api\Admin\ProfileController@showView')->name('profile.index');
});

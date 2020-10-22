<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('/download', 'ModuleController@download')->name('module.downloaddemo');

Route::get('/lk/downloadfull', 'ModuleController@downloadfull')->name('module.download');
Route::get('/', 'HomeController@index');
Route::get('/payment/done', 'PaymentController@done')->name('payment.done');
Route::group( ['middleware' => ['auth','checksub']], function() {
    Route::resource('/sub', 'SubController', ['names' => [
        'index'=>'sub',
        'create' => 'sub.build',
        'edit' => 'sub.edit',

    ]]);
Route::get('/lk', 'LkController@index')->name('lk');
Route::get('/auth/update', 'LkController@edit')->name('run_update');
Route::patch('/auth/update/{id}', 'LkController@update')->name('update');

Route::get('/payment/createMouth', 'PaymentController@createMouth')->name('payment.createMouth');
Route::get('/payment/createThreeMouth', 'PaymentController@createThreeMouth')->name('payment.createThreeMouth');
Route::get('/payment/createHalfYear', 'PaymentController@createHalfYear')->name('payment.createHalfYear');
Route::get('/payment/createYear', 'PaymentController@createYear')->name('payment.createYear');

Route::get('/payment/notdone', 'PaymentController@notdone')->name('payment.notdone');
Route::resource('/payment', 'PaymentController', ['names' => [
        'index'=>'payment',
        'store' => 'payment.build',
        

    ]]);

});
Route::get('admin', 'AdminController@index')->name('admin');
Route::resource('admin/news', 'NewsController', ['names' => [
    'index'=>'news',
    'create' => 'news.build',
    'edit' => 'news.edit',

]]);
Route::resource('admin/drive_users','UserController', ['names' => [
    'index'=>'user',
    'edit' => 'user.edit',

]]);
Route::resource('admin/module', 'ModuleController', ['names' => [
    'index'=>'module',
    'edit' => 'module.edit',

]]);
Route::get('privacy', 'PrivacyController@index')->name('privacy');
Route::get('paymentinfo', 'PaymentinfoController@index')->name('paymentinfo');
Route::get('/reg', 'RegController@index');
// Route::post('/upload', function (Request $request) {
//     dd($request->file("thing")->store("1bdhbP21KUMIgltwH3bUpm3X4s7VwLSkk","google"));
// })->name("upload");
Route::post('/upload', 'ModuleController@update')->name("upload");
Route::get('/test', 'SpaController@index');
Route::get('/upd', 'UpdateController@index');
Route::get('/dwnl', 'UpdateController@download');
Auth::routes();


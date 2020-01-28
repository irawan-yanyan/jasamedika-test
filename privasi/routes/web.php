<?php

/*--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//route data kelurahan
Route::get('/kelurahan','PasienKelurahanController@index');
Route::post('/simpankelurahanpasien','PasienKelurahanController@simpankelurahan');
Route::get('/hapuskelurahanpasien/{id}','PasienKelurahanController@hapuskelurahan');
Route::get('/editkelurahanpasien/{id}','PasienKelurahanController@editkelurahan');
Route::post('/updatekelurahanpasien','PasienKelurahanController@updatekelurahanpasien');
//route data pasien
Route::get('/registrasipasien','PasienKelurahanController@registrasipasien');
Route::get('/tambahpasien','PasienKelurahanController@tambahpasien');
Route::get('/editpasien/{id}','PasienKelurahanController@editpasien');
Route::post('/simpanpasien','PasienKelurahanController@simpanpasien');
Route::get('/hapuspasien/{id}','PasienKelurahanController@hapuspasien');

?>

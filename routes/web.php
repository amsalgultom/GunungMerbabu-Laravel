<?php

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



// Route::get('/about', function () {
//     return view('about');
// });


// Route::get('/pendaki', 'PendakiController@index');

Route::get('/', function () {
    return view('index');
});
// Route::get('/hikings', 'HikingsController@index');
// Route::get('/hikings/create', 'HikingsController@create');
// Route::get('/hikings/{hiking}', 'HikingsController@show');
// Route::post('/hikings', 'HikingsController@store');
// Route::delete('/hikings/{hiking}', 'HikingsController@destroy');
// Route::get('/hikings/{hiking}/edit', 'HikingsController@edit');
// Route::patch('/hikings/{hiking}', 'HikingsController@update');

// Mewakili sgla jenis route pada model Hikings
Route::resource('hikings', 'HikingsController');
// Mewakili sgla jenis route pada model Pendaki
Route::resource('pendaki', 'PendakiController');
// Mewakili sgla jenis route pada model Jalur
Route::resource('jalur', 'JalurController');
Auth::routes();

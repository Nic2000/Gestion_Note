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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create_prof', 'GNoteController@create_prof')->name('gnotes.create_prof');
Route::get('/create_mat', 'GNoteController@create_mat')->name('gnotes.create_mat');
Route::get('/create_note', 'GNoteController@create_note')->name('gnotes.create_note');
Route::get('gnotes/delete/{id}', 'GNoteController@destroy')->name('gnotes.delete');
Route::get('gnotes/edit_eleve/{id}', 'GNoteController@edit_eleve')->name('gnotes.edit_eleve');
Route::put('gnotes/update_eleve/{id}', 'GNoteController@update_eleve')->name('gnotes.update_eleve');
Route::get('gnotes/destroy_eleve/{id}','GnoteController@destroy_eleve')->name('gnotes.destroy_eleve');

Route::post('/store_prof','GNoteController@store_prof')->name('gnotes.store_prof');
Route::post('/store_mat','GNoteController@store_mat')->name('gnotes.store_mat');
Route::post('/store_note','GNoteController@store_note')->name('gnotes.store_note');

//Route::put('gnotes/update/{note}', 'GnoteController@update')->name('gnotes.update');

Route::resource('gnotes','GNoteController');

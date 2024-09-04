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
    return redirect()->route('login');
});

Auth::routes(["reset" => false]);

Route::post("/usernameCheck", "Auth\RegisterController@usernameCheck")->name('usernameCheck');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/searchContent', 'SearchContentController@index')->name('searchContent');
    Route::post('/searchContent', 'SearchContentController@do_search_content')->name('do_search_content');
    Route::get('/condividiPost', 'SearchContentController@condividiPost')->name('condividiPost');
    Route::get('/searchPeople', 'SearchPeopleController@index')->name('searchPeople');
    Route::post('/searchPeople', 'SearchPeopleController@do_search_people')->name('do_search_people');
    Route::get('/do_search_people_def', 'SearchPeopleController@do_search_people_def')->name('do_search_people_def');
    Route::get('/follow', 'SearchPeopleController@follow')->name('follow');
    Route::get('/utenti_seguiti', 'HomeController@utenti_seguiti')->name('utenti_seguiti');
    Route::get('/stampa_like', 'HomeController@stampa_like')->name('stampa_like');
    Route::get('/aggiungi_like', 'HomeController@aggiungi_like')->name('aggiungi_like');
    Route::get('/like_users', 'HomeController@like_users')->name('like_users');
});


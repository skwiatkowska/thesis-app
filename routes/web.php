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

Route::get('/', 'IndexController@index');
Route::get('/logowanie', 'IndexController@login');
Route::get('/rejestracja', 'IndexController@register');
Route::get('/kontakt', 'IndexController@contact');
Route::get('/pierwsze-kroki', 'IndexController@firstSteps');
Route::get('/godziny-otwarcia', 'IndexController@workingHours');



//Route::get('/zasoby', 'BookController@indexMember');


Route::get('/pracownik', 'LibrarianController@index');
Route::get('/pracownik/logowanie', 'LibrarianController@login');
Route::get('/pracownik/czytelnik/nowy', 'LibrarianController@createMember');
// Route::post('/pracownik/czytelnik/nowy', 'LibrarianController@storeMember');
Route::get('/pracownik/czytelnik/znajdz', 'LibrarianController@findMember');

Route::get('/pracownik/kategorie', 'CategoryController@index');
Route::post('/pracownik/kategorie', 'CategoryController@store');

Route::get('/pracownik/autorzy', 'AuthorController@index');
Route::post('/pracownik/autorzy', 'AuthorController@store');
Route::get('/pracownik/autorzy/{id}', 'AuthorController@fetchAuthor');
Route::post('/pracownik/autorzy/{id}/edycja', 'AuthorController@update');

Route::get('/pracownik/wydawnictwa', 'PublisherController@index');
Route::post('/pracownik/wydawnictwa', 'PublisherController@store');
Route::get('/pracownik/wydawnictwa/{id}', 'PublisherController@fetchPublisher');

Route::get('/pracownik/info', 'LibrarianController@info');
Route::get('/pracownik/katalog', 'BookController@index');
Route::post('/pracownik/katalog', 'BookController@findBook');


Route::get('/pracownik/ksiazki/nowa', 'BookController@create');
Route::post('/pracownik/ksiazki/nowa', 'BookController@store');
Route::get('/pracownik/ksiazki/{id}', 'BookController@fetchOneBook');
Route::get('/pracownik/ksiazki/{id}/edycja', 'BookController@editBook');
Route::post('/pracownik/ksiazki/{id}/edycja', 'BookController@update');


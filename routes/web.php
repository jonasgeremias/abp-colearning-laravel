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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UsersController');
Route::resource('pessoas', 'PessoasController');
Route::resource('membros', 'MembrosController');
Route::resource('prestacaocontas', 'PrestacaoContaController');

//Auth::routes(['register' => false]);
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/users/destroy_foto/{user}', 'UsersController@destroy_foto')->name('users.destroy_foto');

Route::resource('/company', 'CompanyController');
Route::get('/empresas/destroy_anexo_cont_social/{company}', 'EmpresasController@destroy_anexo_cont_social')->name('empresas.destroy_anexo_cont_social');
Route::get('/empresas/destroy_anexo_cont_incub/{company}', 'EmpresasController@destroy_anexo_cont_incub')->name('empresas.destroy_anexo_cont_incub');
Route::get('/empresas/destroy_anexo_adit_incub/{company}', 'EmpresasController@destroy_anexo_adit_incub')->name('empresas.destroy_anexo_adit_incub');

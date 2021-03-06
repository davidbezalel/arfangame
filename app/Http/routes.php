<?php
/**
 * @author: David Bezalel Laoli (david.laoly@gmail.com)
 * @copyright: Mei 2017
 */

/**
 * web view
 */

/* error */
Route::get('oops/permission', function () {
    return view('errors.permission');
});

/* admin */
/* GET HTTP method */
Route::get('admin/dashboard', 'AdminController@dashboard');
Route::get('admin', 'AdminController@dashboard');
Route::get('admin/login', 'AdminController@login');
Route::get('admin/register', 'AdminController@register');
Route::get('admin/logout', 'AdminController@logout');
Route::get('admin/player', 'PlayerAdminController@index');
Route::get('admin/bank', 'BankAdminController@index');
Route::get('admin/transaction', 'TransactionAdminController@index');
Route::get('admin/transaction/{id}', 'TransactionAdminController@detail');
Route::get('admin/deposit', 'DepositAdminController@index');
Route::get('admin/game', 'GameAdminController@index');


/* POST HTTP method */
Route::post('admin/register', 'AdminController@register');
Route::post('admin/login', 'AdminController@login');
Route::post('admin/player', 'PlayerAdminController@index');
Route::post('admin/bank', 'BankAdminController@index');
Route::post('admin/bank/add', 'BankAdminController@add');
Route::post('admin/bank/update', 'BankAdminController@update');
Route::post('admin/bank/delete', 'BankAdminController@delete');
Route::post('admin/transaction', 'TransactionAdminController@index');
Route::post('admin/transaction/valid/{id}', 'TransactionAdminController@valid');
Route::post('admin/transaction/invalid/{id}', 'TransactionAdminController@invalid');
Route::post('admin/transaction/sent/{id}', 'TransactionAdminController@sent');
Route::post('admin/notification/transaction', 'AdminController@transactionnotification');
Route::post('admin/deposit', 'DepositAdminController@index');
Route::post('admin/game', 'GameAdminController@index');
Route::post('admin/game/add', 'GameAdminController@add');

/* player */
/* GET HTTP method */
Route::get('/', 'PlayerController@index');
Route::get('/player/deposit', 'DepositPlayerController@index');
Route::get('/player/logout', 'PlayerController@logout');
Route::get('/player/transaction', 'TransactionPlayerController@index');

/* POST HTTP method */
Route::post('/player/register', 'PlayerController@register');
Route::post('/player/login', 'PlayerController@login');
Route::post('/player/deposit', 'DepositPlayerController@index');
Route::post('/player/transaction', 'TransactionPlayerController@index');
Route::post('/player/transaction/claim', 'TransactionPlayerController@claim');
Route::post('/player/transaction/request', 'TransactionPlayerController@request');


/* multi function url */
Route::post('/bank/all', 'BankAdminController@all');



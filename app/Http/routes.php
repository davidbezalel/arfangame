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
Route::get('admin/player', 'AdminController@player');


/* POST HTTP method */
Route::post('admin/register', 'AdminController@register');
Route::post('admin/login', 'AdminController@login');
Route::post('admin/player', 'AdminController@player');

/* player */
/* GET HTTP method */
Route::get('/', 'PlayerController@index');
Route::get('/player/dashboard', 'PlayerController@dashboard');
Route::get('/player/logout', 'PlayerController@logout');

/* POST HTTP method */
Route::post('/player/register', 'PlayerController@register');
Route::post('/player/login', 'PlayerController@login');


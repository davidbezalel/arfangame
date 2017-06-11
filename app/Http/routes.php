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
Route::get('admin/login', 'AdminController@login');
Route::get('admin/register', 'AdminController@register');


/* POST HTTP method */
Route::post('admin/register', 'AdminController@register');
Route::post('admin/login', 'AdminController@login');
/* player */


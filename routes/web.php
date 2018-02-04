<?php
/*
+--------+----------+--------------------------------------+------------------+------------------------------------------------------------------------+--------------+
| Domain | Method   | URI                                  | Name             | Action                                                                 | Middleware   |
+--------+----------+--------------------------------------+------------------+------------------------------------------------------------------------+--------------+
|        | GET|HEAD | /                                    | home             | App\Http\Controllers\Views\HomeController@index                        | web,auth     |
|        | GET|HEAD | api/user                             |                  | Closure                                                                | api,auth:api |
|        | GET|HEAD | login                                | login            | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,guest    |
|        | POST     | login                                |                  | App\Http\Controllers\Auth\LoginController@login                        | web,guest    |
|        | POST     | logout                               | logout           | App\Http\Controllers\Auth\LoginController@logout                       | web          |
|        | POST     | password/email                       | password.email   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web,guest    |
|        | GET|HEAD | password/reset                       | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web,guest    |
|        | POST     | password/reset                       |                  | App\Http\Controllers\Auth\ResetPasswordController@reset                | web,guest    |
|        | GET|HEAD | password/reset/{token}               | password.reset   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web,guest    |
|        | GET|HEAD | register                             | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest    |
|        | POST     | register                             |                  | App\Http\Controllers\Auth\RegisterController@register                  | web,guest    |
|        | GET|HEAD | room/{roomName?}                     | room             | App\Http\Controllers\Views\HomeController@room                         | web,auth     |
|        | POST     | room/{roomName?}/create              |                  | App\Http\Controllers\Thing\ThingController@create                      | web          |
|        | GET|HEAD | thing/{thingName}/{channel}/{input?} |                  | App\Http\Controllers\Thing\ThingController@touch                       | web          |
+--------+----------+--------------------------------------+------------------+------------------------------------------------------------------------+--------------+
*/


/* Dynamic thing Routes */

Route::get('/thing/{thingName}/{channel}/{input?}', 'Thing\ThingController@touch');
Route::post('/thing/create', 'Thing\ThingController@create');

Auth::routes();
Route::get('/', 'Views\HomeController@index')->name('home');
Route::get('/room/{roomName?}', 'Views\HomeController@room')->name('room');



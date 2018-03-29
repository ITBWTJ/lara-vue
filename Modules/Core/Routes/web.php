<?php


Route::get('/user', [
    'uses' => 'Modules\Core\Http\Controllers\UserController@index',
    'as' => 'user.index'
]);
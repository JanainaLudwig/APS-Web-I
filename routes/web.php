<?php

Route::get('/', 'RecipesController@index');

Route::get('/recipes/{recipe}', 'RecipesController@show');

Route::get('/create', 'RecipesController@create');

Route::post('/create', 'RecipesController@store');

Route::post('/recipes/{recipe}/comment', 'CommentsController@store');

//TODO: delete comment
Route::get('/comments/delete/{comment}', 'CommentsController@delete');


Route::get('/incomplete', 'TasksController@incomplete');


Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');


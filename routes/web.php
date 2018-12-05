<?php

Route::get('/', 'RecipesController@index');

Route::get('/receitas', 'RecipesController@all');

Route::get('/categoria/{category}', 'CategoryController@recipes');

Route::get('/recipes/ingredients/{recipe}', 'RecipesController@ingredients');

Route::get('/pesquisa/', 'RecipesController@search');

Route::get('/recipes/{recipe}', 'RecipesController@show');

Route::get('/create', 'RecipesController@create');

Route::post('/create', 'RecipesController@store');

Route::post('/recipes/{recipe}/comment', 'CommentsController@store');

Route::get('/comments/delete/{comment}', 'CommentsController@delete');


Route::get('/incomplete', 'TasksController@incomplete');

Route::get('/categoria', 'CategoryController@all');


Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');


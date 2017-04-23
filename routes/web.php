<?php

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

// Route::get('articles', 'ArticlesController@index');
// Route::get('articles/create', ['uses' => 'ArticlesController@create', 'as' => 'articles.create']);
// Route::get('articles/{id}', ['uses' => 'ArticlesController@show', 'as' => 'articles.show']);
// Route::post('articles', 'ArticlesController@store');
// Route::get('articles/{id}/edit', ['uses' => 'ArticlesController@edit', 'as' => 'articles.edit']);

Route::resource('articles', 'ArticlesController');

Auth::routes();
Route::get('/home', 'HomeController@index');


Route::get('foo', ['middleware' => 'manager', function()
{
    return 'this page may only be viewed by managers';
}]);

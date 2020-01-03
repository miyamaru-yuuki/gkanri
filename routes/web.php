<?php

Route::get('/', 'GameController@index');
Route::get('/search', 'GameController@search');
Route::get('play/', 'GameController@play');

Route::post('/playaddkakunin', 'GameController@playaddkakunin');
Route::post('/playaddkanryou', 'GameController@playaddkanryou');
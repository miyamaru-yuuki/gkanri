<?php

Route::get('/', 'GameController@index');
Route::get('/search', 'GameController@search');
Route::get('play/', 'GameController@play');
Route::get('play/{gid}/mid/{mid}/', 'GameController@play');
Route::get('/playcount', 'GameController@playcount');

Route::post('/playaddkakunin', 'GameController@playaddkakunin');
Route::post('/playaddkanryou', 'GameController@playaddkanryou');
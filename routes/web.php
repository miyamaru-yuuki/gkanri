<?php

Route::get('/', 'GameController@index');
Route::get('/search', 'GameController@search');
Route::get('play/', 'GameController@play');
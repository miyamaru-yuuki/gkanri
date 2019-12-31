<?php

Route::get('/', 'GameController@index');
Route::get('/searchnumber', 'GameController@searchnumber');
Route::get('/searchage', 'GameController@searchage');
<?php

Route::get('/', 'GameController@index');

Route::post('/searchnumber', 'GameController@searchnumber');
<?php

Route::get('/', 'AdminController@index')->name('index');

Route::resource('pages', 'PageController');

<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function() {
    return ['hello' => 'world'];
});
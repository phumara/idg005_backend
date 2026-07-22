<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{userid}/chat', function ($userid) {
    return view('chat');
});

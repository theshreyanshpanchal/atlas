<?php

use Illuminate\Support\Facades\Route;

Route::prefix('atlas')->group(function () {

    Route::get('/', function () { return view('atlas::pages.splash'); });

    Route::get('/docs', function () { return view('atlas::pages.docs'); });

});

<?php

use Illuminate\Support\Facades\Route;

if (! config('atlas.routes.disable_routes', false)) {

    Route::prefix('atlas')->group(function () {
    
        Route::get('/splash', function () { return view('atlas::pages.splash'); });
    
        Route::get('/docs', function () { return view('atlas::pages.docs'); });
    
    });

}

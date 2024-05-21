<?php

use Illuminate\Support\Facades\Route;
use League\CommonMark\CommonMarkConverter;

if (! config('atlas.routes.disable_routes', false)) {

    Route::prefix('atlas')->group(function () {

        Route::get('/splash', function () { return view('atlas::pages.splash'); });

        Route::get('/docs', function () {

            $converter = new CommonMarkConverter();

            $content = $converter->convertToHtml(file_get_contents('atlas/atlas.md'));

            return view('atlas::pages.docs', compact('content') );
        
        });

    });

}

<?php

use Illuminate\Support\Facades\Route;
use League\CommonMark\CommonMarkConverter;

if (! config('atlas.routes.disable_routes', false)) {

    Route::prefix('atlas')->group(function () {

        Route::get('/splash', function () { return view('atlas::pages.splash'); });

        Route::get('/docs', function () {

            $converter = new CommonMarkConverter();

            $filePath = base_path('vendor/laraverse/atlas/public/docs/atlas.md');

            $content = $converter->convertToHtml(file_get_contents($filePath));

            return view('atlas::pages.docs', compact('content') );

        });

    });

}

<?php

    use Illuminate\Support\Facades\Route;
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

    Route::group([
        'prefix' => LaravelLocalization::setLocale(),
    ], function () {

    });

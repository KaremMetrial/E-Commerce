<?php

    use App\Http\Controllers\Dashboard\Auth\AuthController;
    use App\Http\Controllers\Dashboard\WelcomeController;
    use Illuminate\Support\Facades\Route;
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

    Route::prefix(LaravelLocalization::setLocale())->middleware(
        ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    )->group(function () {
        Route::prefix('dashboard')->group(function () {
            //===================== AuthController ======================================================
            Route::controller(AuthController::class)->group(function () {
                // Login
                Route::prefix('login')->group(function () {
                    Route::get('/', 'loginForm')->name('login.form');
                    Route::post('/', 'login')->name('login');
                })->middleware('guest');
                // Login

                // logout
                Route::post('logout', 'logout')->name('logout')->middleware('auth:admin');
                // logout
            });
            //===================== AuthController ======================================================

            //===================== Protected Routes ======================================================
            Route::middleware('auth:admin')->group(function () {
                // Dashboard Home Page
                Route::get('/', [WelcomeController::class, 'index'])->name('index');
            });
            //===================== Protected Routes ======================================================

        });
    });


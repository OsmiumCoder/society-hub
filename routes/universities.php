<?php

use App\Http\Controllers\UniversityController;

Route::middleware('auth')->group(function () {
    Route::resource('universities', UniversityController::class);
});

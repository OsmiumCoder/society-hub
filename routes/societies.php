<?php

use App\Http\Controllers\SocietyMemberController;
use App\Http\Controllers\UniversitySocietyController;

Route::middleware('auth')->group(function () {
    Route::resource('universities.societies', UniversitySocietyController::class);
    Route::resource('societies.society-members', SocietyMemberController::class)->only(['index', 'store', 'update', 'destroy']);
});

<?php

use App\Http\Controllers\UniversitySocietyController;

Route::middleware('auth')->group(function () {
    Route::resource('universities.societies', UniversitySocietyController::class);
});

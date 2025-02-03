<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BelController;

Route::get('/', [BelController::class, 'index'])->name('index');
Route::post('/start-bel', [BelController::class, 'startBel'])->name('start-bel');
Route::get('/start-bel', [BelController::class, 'showStartBel'])->name('start-bel');
Route::get('/get-call-data', [BelController::class, 'getCallData'])->name('get-call-data');

Route::get('/speaking-status', [BelController::class, 'getSpeakingStatus'])->name('get-speaking-status');
Route::post('/speaking-status', [BelController::class, 'setSpeakingStatus'])->name('set-speaking-status');
<?php

use App\Http\Controllers\ProgressController;
use Illuminate\Support\Facades\Route;

Route::get('step', [ProgressController::class, 'step']);

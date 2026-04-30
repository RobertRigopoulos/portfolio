<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Public-facing routes for the portfolio site.
*/

Route::get('/', [PortfolioController::class, 'index'])->name('home');

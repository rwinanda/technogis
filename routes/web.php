<?php

use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;
use App\Models\Place;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Route::get('/place', PlaceController::class);
Route::resource('/place', PlaceController::class);

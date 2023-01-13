<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// show all listing
Route::get('/', [ListingController::class,'index']);
// create listing
Route::get('/listings/create',[ListingController::class, 'create']);

// store listing data
Route::post('/listings',[ListingController::class, 'store']);

// show edit form
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit']);

// must be under create and store route
// show one listing
Route::get('/listings/{listing}',[ListingController::class, 'show']);

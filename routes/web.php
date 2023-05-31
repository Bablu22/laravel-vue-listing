<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use App\Http\Controllers\ListingOfferController;
use App\Http\Controllers\RealtorListingAcceptOfferController;
use Illuminate\Support\Facades\Redirect;

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

    // Redirect to a named route
    return Redirect::route('listing.index');

});

Route::resource('listing', ListingController::class)->except('destroy');

// User login routes
Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

// Register user
Route::resource('user-account', UserController::class)->only('create', 'store');

// Listing offer
Route::resource('listing.offer', ListingOfferController::class)->middleware('auth')->only('store');

// Realtor listing
Route::prefix('realtor')
    ->name('realtor.')
    ->middleware('auth')
    ->group(function () {
        Route::resource('listing', RealtorListingController::class)->only('index', 'show', 'destroy');
        Route::resource('listing.image', RealtorListingImageController::class)->only('create', 'store', 'destroy');
        Route::name('offer.accept')->put('offer/{offer}/accept', RealtorListingAcceptOfferController::class);
    });


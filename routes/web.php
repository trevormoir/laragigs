<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Http\Request;
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

// Common Resource Routes:
// index - Show all listings 
// show - Show single listing 
// create - Show form to create new listing 
// store - Store new listing 
// edit - Show form to edit listing 
// update - Update listing 
// destroy - Delete listing 

//All Listings
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);

//Single Listing
// Route::get('/listing/{id}', function ($id) {
//     $listing = Listing::find(intval($id));

//     if ($listing) {
//         return view('listing', [
//             'listing' => $listing
//         ]);
//     } else {
//         abort('404');
//     }
// });
//Eloquent Route Model Binding
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Route::get('/hello', function () {
//     return response('<h1>Hello World</h1>');
// });

// Route::get('/posts/{id}', function ($id) {
//     return response('Post' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function (Request $request) {
//     return ($request->name . ' ' . $request->city);
// });

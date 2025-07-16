<?php
use Illuminate\Support\Facades\Route;

use App\Livewire\SlideManager;


// Home page
Route::get('/', function () {
    return view('home');
});




// Home page loading sliders dynamically


// Shop static page
Route::get('/shop', function () {
    return view('shop');
});

// Resource routes for sliders (show, create, store, edit, update, destroy)






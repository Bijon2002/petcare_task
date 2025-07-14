<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;

// Home page loading sliders dynamically


// Shop static page
Route::get('/shop', function () {
    return view('shop');
});

// Resource routes for sliders (show, create, store, edit, update, destroy)


Route::get('/', [SliderController::class, 'index']);
Route::put('/sliders/bulk-update', [SliderController::class, 'bulkUpdate'])->name('sliders.bulk-update');
Route::delete('/sliders/bulk-delete', [SliderController::class, 'bulkDelete'])->name('sliders.bulk-delete');

Route::resource('sliders', SliderController::class)->except(['create', 'edit', 'show']);


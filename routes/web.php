<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationImageController;
use App\Http\Controllers\ViewMoreController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('category',function(){
        return view('admin.category');
    });

    // Route::get('addimage',function(){
    //     return view('admin.addimage');
    // });


    Route::get('admin/dashboard',function(){
        return view('admin.dashboard');
    });

  

Route::resource('location-images', LocationImageController::class);
Route::resource('viewmore', LocationImageController::class);




    
});





Route::get('addimage', [LocationImageController::class, 'addimage'])->name('admin.addimage');
//Route::post('location-images', [LocationImageController::class, 'store'])->name('location-images.store');
Route::get('dashboard', [LocationImageController::class, 'index'])->name('dashboard');




// viewmore
Route::get('viewmore', [ViewMoreController::class, 'addLocation'])->name('admin.viewmore');
Route::post('viewmore', [ViewMoreController::class, 'store'])->name('viewmore.store');



// routes/web.php
Route::get('/details/{title}', [ViewMoreController::class, 'show'])->name('details.show');





require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
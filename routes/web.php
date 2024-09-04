<?php

use App\Http\Controllers\FontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatagoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FontendController::class, 'welcome']);
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// profile
Route::get('/users', [UserController::class, 'users'])->name('users');
Route::get('/profile/edit-profile', [UserController::class, 'edit_user'])->name('edit.user');
Route::post('/update/profile', [UserController::class, 'update_user'])->name('update.user');
Route::post('/update/password', [UserController::class, 'update_password'])->name('update.password');
Route::post('/update/photo', [UserController::class, 'update_photo'])->name('update.photo');
Route::get('/delete/{user_id}', [UserController::class, 'delete'])->name('delete');
Route::post('/adduser', [UserController::class, 'add_user'])->name('add.user');


// catagory
Route::get('/category', [CatagoryController::class, 'category'])->name('category');
Route::post('/category/store', [CatagoryController::class, 'category_store'])->name('category.store');
Route::get('/category-delete/{user_id}', [CatagoryController::class, 'category_delete'])->name('category.delete');
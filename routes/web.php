<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\FontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// author
Route::get('/', [FontendController::class, 'welcome']);
Route::get('/author/login-page', [FontendController::class, 'author_login_page'])->name('author.login.page');
Route::get('/author/register-page', [FontendController::class, 'author_register_page'])->name('author.register.page');
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
Route::get('/category/edit/{category_id}', [CatagoryController::class, 'category_edit'])->name('category.edit');
Route::get('/category/delete/{category_id}', [CatagoryController::class, 'category_delete'])->name('category.delete');
Route::get('/category/trash', [CatagoryController::class, 'category_trash'])->name('category.trash');
Route::get('/category/restore/{category_id}', [CatagoryController::class, 'category_restore'])->name('category.restore');
Route::get('/category/parmanent/delete/{category_id}', [CatagoryController::class, 'category_parmanent_delete'])->name('category.parmanent.delete');
Route::post('/category/update/{category_id}', [CatagoryController::class, 'category_update'])->name('category.update');
Route::post('/category/check/delete', [CatagoryController::class, 'category_check_delete'])->name('category.check.delete');
Route::post('/category/restore/trash', [CatagoryController::class, 'category_restore_trash'])->name('category.restore.trash');


// Tags

Route::get('/tag', [TagController::class, 'tag'])->name('tag');
Route::post('/tag/store', [TagController::class, 'tag_store'])->name('tag.store');
Route::get('/tag/delete/{tag_id}', [TagController::class, 'tag_delete'])->name('tag.delete');


// Authors
Route::post('/author/register-post', [AuthorController::class, 'author_register'])->name('author.register');
Route::post('/author/login-post', [AuthorController::class, 'author_login'])->name('author.login');
Route::get('/author/logout', [AuthorController::class, 'author_logout'])->name('author.logout');
Route::get('/author/dashboard', [AuthorController::class, 'author_dashboard'])->middleware('author')->name('author.dashboard');
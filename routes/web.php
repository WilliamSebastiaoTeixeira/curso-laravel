<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::put('/posts/edit/{id}', [PostController::class, 'change'])->name('admin.change');

Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('admin.edit');

Route::post('/posts', [PostController::class, 'store'])->name('admin.store');

Route::get('/posts/create', [PostController::class, 'create'])->name('admin.create');;

Route::delete('/posts/{id}', [PostController::class,'delete'])->name('admin.delete');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('admin.show');

Route::get('/posts', [PostController::class, 'posts'])->name('admin.posts');
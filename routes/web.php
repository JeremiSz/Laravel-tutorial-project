<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;

Route::get('/', [PostController::class,'index']);

Route::get('/posts/{post}',[PostController::class,'show'])->where('post','[A-z0-9_]+');

Route::get('/categories/{category:slug}',function(\App\Models\Category $category){
    return view('landing',[
        "posts" => $category->posts->load('category'),
        "categories" => [$category],
    ]);
});

Route::get('/register',[RegisterController::class,'register'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');

Route::post('/logout',[RegisterController::class,'logout'])->middleware('auth');
Route::get('/login',[RegisterController::class,'login'])->name('login')->middleware('guest');
Route::post('/login',[RegisterController::class,'start'])->middleware('guest');

Route::middleware('can:admin')->group(function(){
    Route::get('/admin/posts/create',[PostController::class,'create']);
    Route::post('/admin/posts',[PostController::class,'store']);
    Route::get('/admin/posts',[PostController::class,'all']);
    Route::get('/admin/posts/{post}/edit',[PostController::class,'edit']);
    Route::patch('/admin/posts/{post}',[PostController::class,'update']);
    Route::delete('/admin/posts/{post}',[PostController::class,'destroy']);
});



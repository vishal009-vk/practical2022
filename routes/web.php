<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageBlogController;
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

Route::get('/', [DashboardController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','is_admin:user']],function(){
    Route::resource('blog',BlogController::class);
    Route::get('my-blog',[BlogController::class,'myBlog'])->name('user_blog');
});

Route::group(['middleware' => ['auth','is_admin:admin']],function(){
    Route::resource('manage-blog',ManageBlogController::class);
});

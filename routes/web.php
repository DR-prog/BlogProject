<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Admin\Category\IndexController;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
//    Route::get('/', IndexController::class);
//});
//Route::group(['namespace' => 'App\Http\Controllers\Admin\Main','prefix'=>'admin'], function () {
//    Route::group(['namespace' => 'App\Http\Controllers\Admin\Main'], function () {
//        Route::get('/', IndexController::class);
//    });
//});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::name('main.')->group(function() {
    Route::get('/', IndexController::class);
});

//Route::name('admin')->prefix('admin')->group(function (){
//    Route::name('main')->group(function() {
//        Route::get('/', AdminController::class);
//    Route::name('category')->prefix('categories')->group(function (){
//        Route::get('/', CategoryController::class)->name('category.index');
//    });
//});
//});
//
Route::group(['namespace' => 'App\Http\Controllers\Admin','prefix'=>'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'AdminController');
       });
    Route::group(['namespace' => 'Category','prefix'=>'categories'], function () {
        Route::get('/', 'IndexController')->name('category.index');
        Route::get('/create', 'CreateController')->name('category.create');
       });
});

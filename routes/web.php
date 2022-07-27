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
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
       });
       Route::group(['namespace' => 'Tag','prefix'=>'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
       });
});

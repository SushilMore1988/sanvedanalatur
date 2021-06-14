<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function () {
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('roles', App\Http\Controllers\RoleController::class);

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    
    Route::get('/divyang/create', [App\Http\Controllers\DivyangController::class, 'create'])->name('divyang.create');

    Route::get('/admin/index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
    
});
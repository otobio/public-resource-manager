<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AdminController;

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

Route::get('/')
        ->uses(VisitorController::class)
        ->name('visitor.home');

Route::get('/download/{resource}')
        ->uses([VisitorController::class, 'download'])
        ->name('visitor.download.resource');

Route::get('/admin')
        ->uses([AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

Route::resource('/admin/resources', AdminController::class, [
    'as' => 'admin',
    'except' => ['show']
]);


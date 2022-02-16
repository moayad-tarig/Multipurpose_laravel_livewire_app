<?php

use App\Http\Livewire\Admin\Users\ListUsers;
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

Route::get('admin/dashbord','App\Http\Controllers\DashbController')->name('admin.dashbord');

Route::get('admin/users', ListUsers::class)->name('admin.users');


// php artisan make:controller DashbordController --invokable


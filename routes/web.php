<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
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

// Prefix is for URL starting with admin/
Route::prefix('admin')->group(function () {
    Route::any('/',[AdminController::class,'login'])->name('login');
    Route::any('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');

    Route::any('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::any('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

    Route::any('/job/edit/{id}', [JobController::class, 'edit'])->name('job.edit');
    Route::any('/job/delete/{id}', [JobController::class, 'delete'])->name('job.delete');

    Route::any('/department/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::any('/department/delete/{id}', [DepartmentController::class, 'delete'])->name('department.delete');
    // Route::any('/',[AdminController::class,'logout'])->name('logout');
});







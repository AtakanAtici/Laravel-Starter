<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard.page');
})->name('dashboard');

Route::get('/register', [AuthController::class, 'registerIndex'])->name('register.show');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'loginIndex'])->name('login.show');

Route::post('login', [AuthController::class, 'login'])->name('login');


Route::middleware('auth')->group(function (){
    Route::prefix('user')->group(function (){
        Route::get('list', [UserController::class, 'index'])->name('user.list');
    });


    Route::prefix('roles')->group(function (){
       Route::get('list', [RoleController::class, 'index'])->name('role.list')->can('view_roles');
       Route::post('store', [RoleController::class, 'store'])->name('role.store')->can('create_roles');
       Route::post('update', [RoleController::class, 'update'])->name('role.update')->can('edit_roles');
       Route::get('destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy')->can('delete_roles');
    });

    Route::prefix('users')->group(function (){
        Route::get('list', [UserController::class, 'index'])->name('user.list')->can('view_users');
        Route::post('store', [UserController::class, 'store'])->name('user.store')->can('create_users');
        Route::post('update', [UserController::class, 'update'])->name('user.update')->can('edit_users');
        Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy')->can('delete_users');
    });

});

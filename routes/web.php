<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['namespace' => 'Admin','prefix'=>'admin','middleware'=>'auth'], function () {
    Route::group(['middleware' => ['permission:Add_Role|Edit_Role|Delete_Role']], function () {
        Route::get('/role', [RoleController::class, 'index'])->name('role');
        Route::get('/role/create', [RoleController::class, 'create'])->name('role/create');
        Route::post('/role/store', [RoleController::class, 'store'])->name('role/store');
        Route::get('/role/{id}/edit', [RoleController::class, 'edit'])->name('role/edit');
        Route::put('role/{id}/update', [RoleController::class, 'update'])->name('role/update');
        Route::delete('/role/delete/{id}', [RoleController::class, 'delete'])->name('role/delete');
    });

    Route::group(['middleware' => ['permission:Add_Permission|Edit_Permission|Delete_Permission']], function () {
    Route::get('/permission', [PermissionController::class, 'index'])->name('permission');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission/create');
    Route::post('/permission/store', [PermissionController::class, 'store'])->name('permission/store');
    Route::get('/permission/{id}/edit', [PermissionController::class, 'edit'])->name('permission/edit');
    Route::put('permission/{id}/update', [PermissionController::class, 'update'])->name('permission/update');
    Route::delete('/permission/delete/{id}', [PermissionController::class, 'delete'])->name('permission/delete');
    });


    Route::group(['middleware' => ['permission:Add_Role|Edit_Role|Delete_Role']], function () {
        Route::get('/rolePer', [RolePermissionController::class, 'index'])->name('rolePer');
    Route::get('/rolePer/create', [RolePermissionController::class, 'create'])->name('rolePer/create');
    Route::post('/rolePer/store', [RolePermissionController::class, 'store'])->name('rolePer/store');
    Route::get('/rolePer/{id}/edit', [RolePermissionController::class, 'edit'])->name('rolePer/edit');
    Route::put('rolePer/{id}/update', [RolePermissionController::class, 'update'])->name('rolePer/update');
    Route::delete('/rolePer/delete/{id}', [RolePermissionController::class, 'delete'])->name('rolePer/delete');
    });

    Route::group(['middleware' => ['permission:Add_Department|Edit_Department|Delete_Department']], function () {
        Route::get('/dept', [DepartmentController::class, 'index'])->name('dept');
    Route::get('/dept/create', [DepartmentController::class, 'create'])->name('dept/create');
    Route::post('/dept/store', [DepartmentController::class, 'store'])->name('dept/store');
    Route::get('/dept/{id}/edit', [DepartmentController::class, 'edit'])->name('dept/edit');
    Route::put('dept/{id}/update', [DepartmentController::class, 'update'])->name('dept/update');
    Route::delete('/dept/delete/{id}', [DepartmentController::class, 'delete'])->name('dept/delete');
    });

    Route::group(['middleware' => ['permission:Add_Employee|Edit_Employee|Delete_Employee']], function () {
        Route::get('/emp', [EmployeeController::class, 'index'])->name('emp');
    Route::get('/emp/create', [EmployeeController::class, 'create'])->name('emp/create');
    Route::post('/emp/store', [EmployeeController::class, 'store'])->name('emp/store');
    Route::get('/emp/{id}/edit', [EmployeeController::class, 'edit'])->name('emp/edit');
    Route::put('emp/{id}/update', [EmployeeController::class, 'update'])->name('emp/update');
    Route::delete('/emp/delete/{id}', [EmployeeController::class, 'delete'])->name('emp/delete');
    });

    Route::group(['middleware' => ['permission:Add_Task|Edit_Task|Delete_Task']], function () {
      Route::get('/task', [TaskController::class, 'index'])->name('task');
    Route::get('/task/create', [TaskController::class, 'create'])->name('task/create');
    Route::post('/task/store', [TaskController::class, 'store'])->name('task/store');
    Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('task/edit');
    Route::put('task/{id}/update', [TaskController::class, 'update'])->name('task/update');
    Route::delete('/task/delete/{id}', [TaskController::class, 'delete'])->name('task/delete');
    });

    Route::group(['middleware' => ['permission:Add_Users|Edit_Users|Delete_Users']], function () {
        Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users/create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users/store');
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users/edit');
    Route::put('users/{id}/update', [UserController::class, 'update'])->name('users/update');
    Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name('users/delete');
    });

});

<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/index', [StudentController::class, 'index'])->name('index');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::get('/roles/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete');

    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/edit/{data}', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/update/{data}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::get('/permissions/delete/{data}', [PermissionController::class, 'delete'])->name('permissions.delete');

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/edit/{data}', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('/students/update/{data}', [StudentController::class, 'update'])->name('students.update');
    Route::get('/students/delete/{data}', [StudentController::class, 'delete'])->name('students.delete');

    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('/teachers/store', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/teachers/edit/{data}', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::post('/teachers/update/{data}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::get('/teachers/delete/{data}', [TeacherController::class, 'delete'])->name('teachers.delete');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{data}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{data}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/delete/{data}', [UserController::class, 'delete'])->name('users.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

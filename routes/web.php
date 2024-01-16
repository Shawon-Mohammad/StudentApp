<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClassAttendenceController;
use App\Http\Controllers\ClassStudentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\KlassController;
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

    Route::get('/sections', [SectionController::class, 'index'])->name('sections.index');
    Route::get('/sections/create', [SectionController::class, 'create'])->name('sections.create');
    Route::post('/sections/store', [SectionController::class, 'store'])->name('sections.store');
    Route::get('/sections/edit/{data}', [SectionController::class, 'edit'])->name('sections.edit');
    Route::post('/sections/update/{data}', [SectionController::class, 'update'])->name('sections.update');
    Route::get('/sections/delete/{data}', [SectionController::class, 'delete'])->name('sections.delete');

    Route::get('/classes', [KlassController::class, 'index'])->name('classes.index');
    Route::get('/classes/create', [KlassController::class, 'create'])->name('classes.create');
    Route::post('/classes/store', [KlassController::class, 'store'])->name('classes.store');
    Route::get('/classes/edit/{data}', [KlassController::class, 'edit'])->name('classes.edit');
    Route::post('/classes/update/{data}', [KlassController::class, 'update'])->name('classes.update');
    Route::get('/classes/delete/{data}', [KlassController::class, 'delete'])->name('classes.delete');

    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/edit/{data}', [BookController::class, 'edit'])->name('books.edit');
    Route::post('/books/update/{data}', [BookController::class, 'update'])->name('books.update');
    Route::get('/books/delete/{data}', [BookController::class, 'delete'])->name('books.delete');

    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/authors/store', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/authors/edit/{data}', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::post('/authors/update/{data}', [AuthorController::class, 'update'])->name('authors.update');
    Route::get('/authors/delete/{data}', [AuthorController::class, 'delete'])->name('authors.delete');

    Route::get('/class_attendences', [ClassAttendenceController::class, 'index'])->name('class_attendences.index');
    Route::get('/class_attendences/create', [ClassAttendenceController::class, 'create'])->name('class_attendences.create');
    Route::post('/class_attendences/store', [ClassAttendenceController::class, 'store'])->name('class_attendences.store');
    Route::get('/class_attendences/edit/{data}', [ClassAttendenceController::class, 'edit'])->name('class_attendences.edit');
    Route::post('/class_attendences/update/{data}', [ClassAttendenceController::class, 'update'])->name('class_attendences.update');
    Route::get('/class_attendences/delete/{data}', [ClassAttendenceController::class, 'delete'])->name('class_attendences.delete');

    Route::get('/class_students', [ClassStudentController::class, 'index'])->name('class_students.index');
    Route::get('/class_students/create', [ClassStudentController::class, 'create'])->name('class_students.create');
    Route::post('/class_students/store', [ClassStudentController::class, 'store'])->name('class_students.store');
    Route::get('/class_students/edit/{data}', [ClassStudentController::class, 'edit'])->name('class_students.edit');
    Route::post('/class_students/update/{data}', [ClassStudentController::class, 'update'])->name('class_students.update');
    Route::get('/class_students/delete/{data}', [ClassStudentController::class, 'delete'])->name('class_students.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

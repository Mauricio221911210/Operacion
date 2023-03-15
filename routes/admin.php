<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;

use App\Http\Livewire\CourseStatus;

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');

Route::resource('roles', RoleController::class)->names('roles');

Route::resource('users', UserController::class)->only('index', 'edit', 'update')->names('users');

Route::get('archive', [CourseController::class, 'index'])->name('courses.index');

Route::get('archive/revision', [CourseController::class, 'revisiona'])->name('courses.archive');

Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show'); 

Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');

Route::post('courses/{course}/revision', [CourseController::class, 'revision'])->name('courses.revision');

Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');

Route::post('courses/{course}/reject', [CourseController::class, 'reject'])->name('courses.reject');

Route::get('archive-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesPersons;

Route::redirect('', 'instructor/archive');

Route::resource('courses', CourseController::class)->names('courses');

Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->name('courses.curriculum');

Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');

Route::get('courses/{course}/persons', CoursesPersons::class)->name('courses.persons');

Route::post('courses/{course}/status', [CourseController::class, 'status'])->name('courses.status');

Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\InstructorCourses;

Route::redirect('', 'instructor/archive');

Route::get('archive', InstructorCourses::class)->middleware('can:Leer Archivos')->name('courses.index');


<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;

use App\Http\Livewire\CourseStatus;

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

Route::get('/', HomeController::class )->name('home');

Route::middleware([ 'auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('archive', [CourseController::class, 'index'] )->name('courses.index');

Route::get('archive/{course}', [CourseController::class, 'show']) ->name('courses.show');

Route::post('archive/{course}/enrolled', [CourseController::class,'enrolled'])->middleware('auth')->name('courses.enrolled');

Route::get('archive-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth'); 















<?php

use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
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

Route::get('/dashboard', [AttendancesController::class, 'index']);
Route::get('/login-page', [AuthController::class, 'loginPage']);
Route::post('/login-store', [AuthController::class, 'loginStore']);
Route::get('/create-teacher-page', [TeacherController::class, 'registerPage']);
Route::get('/teacher/edit/{id}', [TeacherController::class, 'update'])->name('teacher_edit');
Route::patch('/teacher/update/{id}', [TeacherController::class, 'updateInput'])->name('teacher_update');
Route::post('/create-teacher-post', [TeacherController::class, 'registerAuth']);
Route::get('/create-attendances', [AttendancesController::class, 'createPage']);
Route::post('/create-attendances-store', [AttendancesController::class, 'createStore']);
Route::get('/dashboard-admin', [TeacherController::class, 'show']);
Route::get('/dashboard-admin/attendances', [AttendancesController::class, 'showStatus']);

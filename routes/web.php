<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ExerciseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kita mendefinisikan semua route secara manual.
| Route autentikasi dan route untuk workout serta exercise dibuat secara eksplisit.
|
*/

// Route halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route Autentikasi Manual
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Group route yang hanya dapat diakses oleh user yang sudah login
Route::middleware(['auth'])->group(function () {

    // Dashboard/Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    /*
    |--------------------------------------------------------------------------
    | Routes untuk Workout
    |--------------------------------------------------------------------------
    | Menggunakan manual route dengan model binding untuk parameter {workout}
    */
    Route::get('/workouts', [WorkoutController::class, 'index'])->name('workouts.index');
    Route::get('/workouts/create', [WorkoutController::class, 'create'])->name('workouts.create');
    Route::post('/workouts', [WorkoutController::class, 'store'])->name('workouts.store');
    Route::get('/workouts/{workout}', [WorkoutController::class, 'show'])->name('workouts.show');
    Route::get('/workouts/{workout}/edit', [WorkoutController::class, 'edit'])->name('workouts.edit');
    Route::put('/workouts/{workout}', [WorkoutController::class, 'update'])->name('workouts.update');
    Route::delete('/workouts/{workout}', [WorkoutController::class, 'destroy'])->name('workouts.destroy');

    /*
    |--------------------------------------------------------------------------
    | Routes untuk Exercise (Nested dalam Workout)
    |--------------------------------------------------------------------------
    | Menggunakan manual route dengan model binding untuk parameter {workout} dan {exercise}
    */
    Route::get('/workouts/{workout}/exercises', [ExerciseController::class, 'index'])->name('workouts.exercises.index');
    Route::get('/workouts/{workout}/exercises/create', [ExerciseController::class, 'create'])->name('workouts.exercises.create');
    Route::post('/workouts/{workout}/exercises', [ExerciseController::class, 'store'])->name('workouts.exercises.store');
    Route::get('/workouts/{workout}/exercises/{exercise}', [ExerciseController::class, 'show'])->name('workouts.exercises.show');
    Route::get('/workouts/{workout}/exercises/{exercise}/edit', [ExerciseController::class, 'edit'])->name('workouts.exercises.edit');
    Route::put('/workouts/{workout}/exercises/{exercise}', [ExerciseController::class, 'update'])->name('workouts.exercises.update');
    Route::delete('/workouts/{workout}/exercises/{exercise}', [ExerciseController::class, 'destroy'])->name('workouts.exercises.destroy');
});

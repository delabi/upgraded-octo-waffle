<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CapasController;
use App\Http\Controllers\IncidentsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Models\Message;
use App\Models\Post;
use App\Models\Task;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use App\Livewire\Counter;

Route::view('/', 'home');

// Route::resource('jobs', JobController::class)->middleware('auth');
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit','job');

Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::post('/jobs/{job}', [JobController::class, 'destroy']);

Route::resource('tasks', TaskController::class);

Route::get('/counter', Counter::class);


//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::post('/audit', function()
{
    //dd("Saving Audit Results");
    return redirect('/tasks');
});

Route::get('/capas', [CapasController::class, 'index']);
Route::get('/incidents', [IncidentsController::class, 'index']);
Route::get('/calendar', [CalendarController::class, 'index']);

Route::view('/about', 'about');


Route::view('/contact', 'contact');

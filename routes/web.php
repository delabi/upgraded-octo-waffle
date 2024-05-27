<?php

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

Route::resource('jobs', JobController::class);

Route::resource('tasks', TaskController::class);

Route::get('/counter', Counter::class);

// Route::get('/run-migration', function(){
//     Artisan::call('optimize:clear');
//     Artisan::call('migrate:refresh --seed');
//     return "Migrations executed successfully";
// });


//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::view('/about', 'about');


Route::view('/contact', 'contact');

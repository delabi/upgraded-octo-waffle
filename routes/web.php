<?php

use Illuminate\Support\Facades\Route;
use App\Models\Message;
use App\Models\Post;
use App\Http\Controllers\JobController;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

Route::get('/messages', function (){
    return view('messages', [
        'messages' => Message::all()
    ]);
});

Route::get('/messages/{id}', function ($id) {
    $message = Message::find($id);
    return view('message', ['message' => $message]);
});

Route::get('/posts', function () {
    return view('posts', [

        'posts' => Post::all()
    ]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
        return view('contact');
});

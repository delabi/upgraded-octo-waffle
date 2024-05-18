<?php

use Illuminate\Support\Facades\Route;
use App\Models\Message;
use App\Models\Post;
use App\Http\Controllers\JobController;

Route::view('/', 'home');

// Route::controller(JobController::class)->group(function(){
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });

Route::resource('jobs', JobController::class);



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

Route::view('/about', 'about');


Route::view('/contact', 'contact');

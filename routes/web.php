<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;
use App\Models\Message;
use App\Models\Post;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->cursorPaginate(3); //paginate(3);

    return view('jobs', [

        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('job', ['job' => $job]);
});

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

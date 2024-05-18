<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;
use App\Models\Message;
use App\Models\Post;

Route::get('/', function () {
    return view('home');
});

//Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3); //paginate(3);

    return view('jobs.index', [

        'jobs' => $jobs
    ]);
});

// Create
Route::get('/jobs/create', function () {
    return view ('jobs.create');

});

// Show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

// Store
Route::post('/jobs', function(){

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
    // validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // authorization(on hold)


    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $job->id);

});

// Destroy
Route::delete('/jobs/{id}', function ($id) {

    // authorize
    // delete job
    Job::findOrFail($id)->delete();

    return redirect('/jobs');

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

<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    $jobs = Job::simplepaginate(15);
    return view('home', ['jobs' => $jobs]);
});


Route::get('/jobs', function () {
    //$jobs = Job::all();
    //$jobs = Job::simplepaginate(15);
    $jobs = Job::latest()->paginate(15);
    return view('jobs/index', ['jobs' => $jobs]);
});


Route::get('jobs/show/{id}', function ($id) {
    return view('jobs/show', ['job' => Job::findById($id)]);
});


Route::post('jobs/create', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});


Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    $job = Job::findOrFail($id);

    $job->title = request('title');
    $job->salary = request('salary');
    $job->save();
    /*Job::update([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);*/
    return redirect('jobs/show/' . $id);
});


Route::delete('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id);
    $job->delete();
    return redirect('/');
});


Route::get('/jobs/{id}/edit', function ($id) {
    return view('jobs/edit', ['job' => Job::findById($id)]);
});

Route::view('/contact', 'contact');
Route::view('jobs/create', 'jobs/create');





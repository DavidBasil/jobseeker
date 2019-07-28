<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Http\Requests\JobStoreRequest;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->take(10)->get();
        return view('welcome', compact('jobs'));
    }

    public function show($id, Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(JobStoreRequest $request)
    {
        Job::create([
            'user_id' => auth()->user()->id,
            'company_id' => auth()->user()->company->id,
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'last_date' => request('last_date')
        ]);
        return redirect('/')->with('success', 'New Job Added');
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect(route('jobs.myjobs'))->with('success', 'Job "'.$job->title.'" was updated');
    }

    public function myJobs()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('jobs.myjobs', compact('jobs'));
    }

}

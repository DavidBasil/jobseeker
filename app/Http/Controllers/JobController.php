<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\Http\Requests\JobStoreRequest;
use Auth;

class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware(['employer', 'verified'], ['except' => ['index', 'show', 'apply', 'allJobs']]);
    }

    public function index()
    {
        $jobs = Job::orderBy('created_at', 'asc')->take(10)->where('status', 1)->get();
        $companies = Company::get()->random(9);
        return view('welcome', compact('jobs', 'companies'));
    }

    public function allJobs(Request $request)
    {
        $type = $request->get('type');
        $category = $request->get('category_id');

        if($type || $category ){
            $jobs = Job::where('type', $type)
                ->orWhere('category_id', $category)
                ->paginate(10);
            return view('jobs.alljobs', compact('jobs'));
        } else {
            $jobs = Job::latest()->paginate(10);
            return view('jobs.alljobs', compact('jobs'));
        }

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

    public function apply(Request $request, $id)
    {
        $jobId = Job::findOrFail($id); 
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message', 'You Applied for a job');
    }

    public function applicants(){
        $applicants = Job::has('users')->where('user_id', auth()->user()->id)->get();
        return view('jobs.applicants', compact('applicants'));
    }
}

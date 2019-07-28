<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Job;

class CompanyController extends Controller
{
    public function show($id, Company $company)
    {
        $jobs = Job::where('user_id', $id)->get();
        return view('company.show', compact('company'));
    }

    public function create(){
        return view('company.create');
    }

    public function store(){
        $user_id = auth()->user()->id;

        Company::where('user_id', $user_id)->update([
            'address' => request('address'),
            'phone' => request('phone_number'),
            'website' => request('website'),
            'slogan' => request('slogan'),
            'description' => request('description')
        ]);

        return redirect()->back()->with('message', 'Company Updated');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Job;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employer', 'verified'], ['except' => ['show']]);
    }

    public function show($id, Company $company)
    {
        $jobs = Job::where('user_id', $id)->get();
        return view('company.show', compact('company'));
    }

    public function create(){
        return view('company.create');
    }

    public function store(Request $request){
        $user_id = auth()->user()->id;
        $this->validate($request, [
            'address' => 'required',
            'phone_number' => 'required',
            'website' => 'required',
            'slogan' => 'required',
            'description' => 'required'
        ]);

        Company::where('user_id', $user_id)->update([
            'address' => request('address'),
            'phone' => request('phone_number'),
            'website' => request('website'),
            'slogan' => request('slogan'),
            'description' => request('description')
        ]);

        return redirect()->back()->with('message', 'Company Updated');
    }

    public function coverphoto(Request $request)
    {
        $this->validate($request, [
            'cover_photo' => 'required|mimes:jpeg,jpg,png'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasFile('cover_photo')){
            $file = $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/coverphoto/', $filename);
            Company::where('user_id', $user_id)->update([
                'cover_photo' => $filename
            ]);
        return redirect()->back()->with('cover_photo', 'Cover photo Updated');
        } else {
            return redirect()->back()->with('cover_photo', 'Please select an image');
        }
    }

    public function logo(Request $request)
    {
        $this->validate($request, [
            'logo' => 'required|mimes:png,jpg,jpeg|max:5000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/logo/', $filename);
            Company::where('user_id', $user_id)->update([
                'logo' => $filename
            ]);
            return redirect()->back()->with('logo', 'Cover photo Updated');
        } else {
            return redirect()->back()->with('logo', 'Please select an image');
        }
    }

}

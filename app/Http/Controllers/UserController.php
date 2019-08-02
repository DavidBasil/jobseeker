<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware(['seeker', 'verified']);
    }

    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'bio' => 'required',
            'experience' => 'required'
        ]);
        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'address' => request('address'),
            'experience' => request('experience'),
            'bio' => request('bio'),
            'phone_number' => request('phone_number')
        ]);

        return redirect()->back()->with('message', 'Profile Updated');
    }

    public function coverletter(Request $request){
        $this->validate($request, [
            'cover_letter' => 'required|mimes:pdf,doc,docs,txt|max:5000'
        ]);
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'cover_letter' => $cover
        ]);

        return redirect()->back()->with('cover_letter', 'Cover letter updated');
    }

    public function resume(Request $request){
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docs,txt|max:5000'
        ]);
        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'resume' => $resume
        ]);

        return redirect()->back()->with('resume', 'Resume updated');
    }

    public function avatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|mimes:png,jpg,jpeg|max:5000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/avatar/', $filename);
            Profile::where('user_id', $user_id)->update([
                'avatar' => $filename
            ]);

            return redirect()->back()->with('avatar', 'Avatar updated');
        }
    }

}

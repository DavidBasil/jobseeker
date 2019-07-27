<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $request->get('address');
    }

}

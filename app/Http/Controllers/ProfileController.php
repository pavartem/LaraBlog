<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.profile',['user'=>$user]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'  =>  'required',
            'email' =>  'required|email|unique:users',
            'password' =>  'required',
            'avatar' =>  'nullable|image'

        ]);

        $user = Auth::user();
        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->get('image'));

        return redirect()->back()->with('status','Профіль обновився');
    }
}

<?php

namespace App\Http\Controllers;

use App\Moods;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $moods = Auth::user()->profile()->first()->moods()->get();
        $profile = Auth::user()->profile()->first();

        return view('profile.index')->with(['moods'=> $moods ,'profile' => $profile ]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $profile->mood_percentage = $request->mood_percentage;
        $profile->save();
        return back();
    }

    public function show($name)
    {
        $user = User::where('name',$name)->first();

        $moods = $user->profile()->first()->moods()->where('is_selected',1)->get();
        $profile = $user->profile()->first();


        return view('profile.show')->with(['moods'=> $moods ,'profile' => $profile ,'user'=>$user]);
    }

}

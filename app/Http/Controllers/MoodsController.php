<?php

namespace App\Http\Controllers;

use App\Moods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {



        $moods = Moods::create([
            'title' => $request->title,
            'profile_id' => Auth::user()->profile()->first()->id
        ]);

        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Moods  $moods
     * @return \Illuminate\Http\Response
     */
    public function edit(Moods $moods)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Moods  $moods
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Moods $mood)
    {

            $mood->is_selected = !$mood->is_selected;
            $mood->save();
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Moods  $moods
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moods $moods)
    {
        //
    }

    public function selectedItems()
    {

    }

}

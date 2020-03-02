<?php

namespace App\Http\Controllers;

use App\Profiles;
use App\Country;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get();
        $positions = Position::get();

        return view('profile.create', compact('countries', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = new Profiles();
        $profile->name = request('name');
        $profile->position_id = request('position_id');
        $profile->nationality_id = request('nationality_id');
        $profile->height = request('height');
        $profile->weight = request('weight');
        $profile->current_team = request('current_team');
        $profile->birthday = request('birthday');
        $profile->age = request('age');
        if (isset($request->avatar)) {
            if ($request->file('avatar')->isValid()) {
                // $destinationPath = "images/artists/";
                $extension = $request->file('avatar')->getClientOriginalExtension();
                $fileName = str_random(32) . '.' . $extension;
                $request->file('avatar')->move($fileName);

                // standardize the image dimension (optional)
                Image::make($destinationPath.$fileName)->fit(350, 450)->save();

                $artist->avatar = '/' . $destinationPath . $fileName;
            }
        }
        $profile->avatar = $request->file('avatar');
        $filename = time().$profile->getClientOriginalName();

        Storage::disk('local')->putFileAs(
            'avatar/'.$filename,
            $profile,
            $filename
        );
        // $profile->avatar = request('avatar');
        dd($profile);
        $profile->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function show(Profiles $profiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function edit(Profiles $profiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profiles $profiles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profiles $profiles)
    {
        //
    }
}

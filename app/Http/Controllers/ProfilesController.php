<?php

namespace App\Http\Controllers;

use App\Profiles;
use App\Country;
use App\Position;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q;

        $profiles = Profiles::select('profiles.*')
            ->join('countries', 'profiles.nationality_id', 'countries.id')
            ->join('positions', 'profiles.position_id', 'positions.id');

        if($q)
        {
            $profiles = $profiles->where(function($query) use($q)
            {
                $query->where('profiles.name', 'LIKE', '%' . $q . '%')
                ->orWhere('profiles.height', 'LIKE', '%' . $q . '%')
                ->orWhere('profiles.weight', 'LIKE', '%' . $q . '%')
                ->orWhere('profiles.current_team', 'LIKE', '%' . $q . '%')
                ->orWhere('profiles.age', 'LIKE', '%' . $q . '%')
                ->orWhere('countries.name', 'LIKE', '%' . $q . '%')
                ->orWhere('positions.desc', 'LIKE', '%' . $q . '%') ;
            });
        }
        $profiles = $profiles->orderBy('created_at', 'desc')
            ->get();

        return view('profile.index', compact('profiles'));
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
    public function store(ProfileRequest $request)
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
        $path = Storage::putFile('avatars', $request->file('avatar'));
        $profile->avatar = $path;
        // dd($profile);
        $profile->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function show(Profiles $profiles)
    {
        return view('profile.show', compact('profiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function edit(Profiles $profiles)
    {
        $countries = Country::get();
        $positions = Position::get();

        return view('profile.edit', compact('countries', 'positions', 'profiles'));
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
        $profiles->name = request('name');
        $profiles->position_id = request('position_id');
        $profiles->nationality_id = request('nationality_id');
        $profiles->height = request('height');
        $profiles->weight = request('weight');
        $profiles->current_team = request('current_team');
        $profiles->birthday = request('birthday');
        $profiles->age = request('age');
        if($request->avatar)
        {
            $path = Storage::putFile('avatars', $request->file('avatar'));
            $profiles->avatar = $path;
        }
        $profiles->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profiles $profiles)
    {
        $profiles->forceDelete();

        return redirect('/');
    }
}

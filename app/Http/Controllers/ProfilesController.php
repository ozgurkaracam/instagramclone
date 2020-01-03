<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use Image;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {

        return view('profiles.home',[ 'user'=> User::find($user)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        $profile=$user->profile;
        return view('profiles.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->image) {
            $data=$request->validate([
                'title'=>'required',
                'url' => 'required|url',
                'description' => 'required',
                'image'=> 'required|image'
            ]);
            $profile= Profile::findOrFail($id);
            $profile->title=$data['title'];
            $profile->url=$data['url'];
            $profile->image=$data['image']->hashName();
            $profile->description=$data['description'];
            $request['image']->store('uploads','public');
//            $path=$request->file('image');
//            $image=Image::make($path)->resize(800,800);
//            $link = Storage::put('storage/uploads',$image);
        }
        else{
            $data=$request->validate([
                'title'=>'required',
                'url' => 'required|url',
                'description' => 'required'
            ]);
            $profile= Profile::findOrFail($id);
            $profile->title=$data['title'];
            $profile->url=$data['url'];
            $profile->description=$data['description'];
        }

        $profile->save();
        return redirect()->route('profile.show',$profile->user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

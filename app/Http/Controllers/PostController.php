<?php

namespace App\Http\Controllers;

use App\Post;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title' => 'required',
            'description'=>'required',
            'image' => 'required|image'
        ]);
        $image= $request->image->hashName();
        Auth::user()->posts()->create([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'image'=>$image
        ]);
        $request['image']->store('uploads','public');
        $img=Image::make('storage/uploads/'.$image);
        $img->resize(800,800);
        $img->save();
        return redirect()->route('profile.show',Auth::user()->id);
//        Storage::disk('local')->put()
//        return redirect('/profile/'.Auth::user()->id);
//        Storage::disk('local')->put($request->file('image'),'uploads');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $post= Post::findOrFail($post);
        return view('posts.detail',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

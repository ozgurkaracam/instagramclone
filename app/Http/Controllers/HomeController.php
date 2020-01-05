<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();
        $users=[];
        $posts=[];
        foreach ($user->following as $u){
            foreach ($u->posts as $item){
                array_push($posts,$item);
            }
        }
        foreach($user->posts as $item){
            array_push($posts,$item);
        }
        $posts=collect($posts)->sortByDesc('created_at');
//        dd($posts);
        return view('home',compact('posts'));
    }
}

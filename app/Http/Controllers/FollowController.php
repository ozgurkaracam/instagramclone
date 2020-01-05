<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class FollowController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function followers($user){
            $users=User::find($user)->followers;
            return view('profiles.followers',compact('users'));
    }
    public function following($user){
        $users=User::find($user)->following;
        return view('profiles.following',compact('users'));
    }

    public function follow(Request $request,$user){
        $user = \App\User::find($user);
        $following=\App\User::find(Auth::user());
        $user->followers()->attach($following);
        $user->save();
        return $user->followers;
    }
    public function unfollow($user){
        $user = \App\User::find($user);
        $following=\App\User::find(Auth::user());
        $user->followers()->detach($following);
        $user->save();
        return $user->followers;
    }
}

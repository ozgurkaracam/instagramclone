<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow(Request $request,$user){
        $user = User::find($user);
        $user->followers()->attach($request->following);
        return 'OK';
    }
    public function unfollow($user){
        $user = User::find($user);
        $user->followers()->detach(Auth::user());
    }
}

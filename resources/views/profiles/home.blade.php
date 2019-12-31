@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 p-5">
            <img src="https://instagram.fesb3-2.fna.fbcdn.net/v/t51.2885-19/s320x320/66185921_2361364614120601_5895999020819546112_n.jpg?_nc_ht=instagram.fesb3-2.fna.fbcdn.net&_nc_ohc=F-5tuwV13_wAX_TY_D9&oh=795a61265fad95fdbbd10a88e342f0c6&oe=5EB42A9A" class="rounded-circle" style="max-height: 200px" alt="">
        </div>
        <div class="col-md-9 pt-5 pl-6">
            <div class="d-flex justify-content-between align-items-baseline"><h1>{{ $user->username }}</h1>
                @if(\Illuminate\Support\Facades\Auth::user()->username==$user->username)
                    <a href="{{ route('p.create') }}">Add New Post</a>
                @else
                    <a href="#">Follow This User</a>
                    @endif
            </div>
            <div class="d-flex">
                <div class="pr-3"><strong>153 </strong>post</div>
                <div class="pr-3"><strong>23k </strong>followers</div>
                <div><strong>212</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->name }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="{{ $user->profile->url }}" class="font-weight-bold">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-4">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTZc-iu1LkhxInaANRO7Wv2eHVp_IEDIO5XmoCeKujDotbXfLkV" class="w-75" alt="">
        </div>
        <div class="col-4">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTZc-iu1LkhxInaANRO7Wv2eHVp_IEDIO5XmoCeKujDotbXfLkV" class="w-75" alt="">
        </div>
        <div class="col-4">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTZc-iu1LkhxInaANRO7Wv2eHVp_IEDIO5XmoCeKujDotbXfLkV" class="w-75" alt="">
        </div>
    </div>
</div>
@endsection

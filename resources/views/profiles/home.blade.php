@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 p-5">
            <img src="/storage/uploads/{{ $user->profile->profile_image  }}" class="rounded-circle img-fluid"  alt="">
        </div>
        <div class="col-md-9 pt-5 pl-6">
            <div class="d-flex justify-content-between align-items-baseline"><h1>{{ $user->username }}</h1>
                @if(\Illuminate\Support\Facades\Auth::user() && \Illuminate\Support\Facades\Auth::user()->username==$user->username)
                    <a href="{{ route('p.create') }}">Add New Post</a>
                @else

                    <follow-button status="{{ $user->followers->contains(\Illuminate\Support\Facades\Auth::user()) }}" follower="{{ $user->id }}"></follow-button>

                    @endif
            </div>
            <div class="d-flex">
                <div class="pr-3"><strong>{{ $user->posts->count() }} </strong>post</div>
                <div class="pr-3"><a href="{{ route('profile.followers',$user->id) }}"><strong>{{ $user->followers->count() }} </strong>followers</a></div>
                <div><a href="{{ route('profile.following',$user->id) }}"><strong> {{ $user->following->count() }}</strong> following</a></div>
            </div>
            @can('update',$user->profile)
            <div>
                <a href="{{ route('profile.edit',$user->id) }}">Edit Profile</a>
            </div>
            @endcan
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="{{ $user->profile->url }}" class="font-weight-bold">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach($posts as $post )
        <div class="col-4 pb-3">
            <a href="{{ route('p.show',$post) }}">
                <img src="/storage/uploads/{{ $post->image }}" class="w-75" alt="">
            </a>
        </div>
        @endforeach


{{--        <div class="col-4">--}}
{{--            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTZc-iu1LkhxInaANRO7Wv2eHVp_IEDIO5XmoCeKujDotbXfLkV" class="w-75" alt="">--}}
{{--        </div>--}}
{{--        <div class="col-4">--}}
{{--            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTZc-iu1LkhxInaANRO7Wv2eHVp_IEDIO5XmoCeKujDotbXfLkV" class="w-75" alt="">--}}
{{--        </div>--}}
    </div>
    <div class="col-md-4 offset-4 pt-3">
        {{ $posts->links() }}
    </div>
</div>

@endsection

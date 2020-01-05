@extends('layouts/app')
@section('content')
        <div class="container">
            <div class="row pt-3">
                <div class="col-md-6">
                    <img src="/storage/uploads/{{ $post->image }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-6 pl-4">
                        <a href="{{ route('profile.show',$post->user->id) }}" class="d-flex align-items-center">
                            <img src="/storage/uploads/{{ $post->user->profile->profile_image }}" style="max-height: 25px"  class="img-fluid rounded-circle mr-2" alt="">
                            <h3>{{ $post->user->username }}</h3>
                        </a>

                    <small> {{ $post->created_at }}</small>
                    <p class="font-weight-bold">{{ $post->title }}</p>
                    <p>{{ $post->description }}</p>
                </div>
            </div>

        </div>
    @endsection

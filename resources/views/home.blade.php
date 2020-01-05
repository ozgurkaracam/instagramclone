@extends('layouts/app')
@section('content')
    <div class="container">
        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="col-md-6 offset-3">
                    <a href="{{ route('p.show',$post->id) }}">
                        <img src="/storage/uploads/{{ $post->image }}" class="card-img-top img-fluid" alt="...">
                    </a>
                </div>

                <div class="card-body">
                    <div class="d-flex">
                        <a href="{{ route('profile.show',$post->user->id) }}" class="d-flex">
                            <div><img src="/storage/uploads/{{ $post->user->profile->profile_image }}" style="max-height: 25px"  class="img-fluid rounded-circle mr-2" alt=""></div>
                            <div><h5 class="card-title font-weight-bolder">{{ $post->user->username }}</h5></div>
                        </a>

                    </div>
                    <p class="card-text">{{ $post->description }}</p>
                    <p class="card-text"><small class="text-muted">{{ $post->diff_date }}</small></p>
                </div>
            </div>

            @endforeach
{{--            <div class="col-md-8 offset-2">--}}
{{--                @foreach($posts as $post)--}}
{{--                    <div>--}}
{{--                        <img src="/storage/uploads/{{ $post->image }}" class="img-fluid w-50 pb-3" alt="">--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <small> {{ $post->created_at }}</small>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <span class="font-weight-bolder"> {{ $post->user->username }}</span> <span> {{ $post->description }}</span>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}

    </div>

    @endsection

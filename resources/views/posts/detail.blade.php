@extends('layouts/app')
@section('content')
        <div class="container">
            <div class="row pt-3">
                <div class="col-md-6">
                    <img src="/storage/uploads/{{ $post->image }}" class="img-fluid" alt="">
                    @can('delete',$post)
                        <form action="{{ route('p.destroy',$post->id) }}" method="POST" class="mt-2">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">DELETE THIS POST</button>
                        </form>
                        @endcan
                </div>
                <div class="col-md-6 pl-4">
                        <a href="{{ route('profile.show',$post->user->id) }}" class="d-flex align-items-center">
                            <img src="/storage/uploads/{{ $post->user->profile->profile_image }}" style="max-height: 25px"  class="img-fluid rounded-circle mr-2" alt="">
                            <h3>{{ $post->user->username }}</h3>
                        </a>

                    <small> {{ $post->created_at }}</small>
                    <p class="font-weight-bold">{{ $post->title }}</p>
                    <p>{{ $post->description }}</p>
                    <like-buttons likecount="{{ $post->likedusers->count() }}"
                                  userid="{{ \Illuminate\Support\Facades\Auth::user()->id }}"
                                  status="{{ $post->likedusers->contains(\Illuminate\Support\Facades\Auth::user())  }}" postid="{{ $post->id }}"
                                  commentcount="{{ $post->comments->count() }}">

                    </like-buttons>
                </div>


            </div>
            <div class="row mt-4">
                <div class="col-md-8 offset-2">
                    @foreach($post->comments as $comment)
                        <div class="card mt-4">

                            <div class="card-body">
                                <div class="card-title">
                                    <img src="/storage/uploads/{{ $comment->user->profile->profile_image }}" width="25px" class="rounded-circle" alt="">
                                    <small>{{ $comment->user->username }}</small>
                                    <small class="text-info">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                                {{ $comment->body }}
                            </div>
                        </div>
                        @endforeach

{{--                    POST COMMENT--}}
                    <form action="{{ route('comments.store',$post->id) }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group col-md-12">
                            <label for="comment" class="col-form-label">
                                Comment
                                <div class="">
                                    <img src="/storage/uploads/{{ $post->user->profile->profile_image }}" width="25px" class="rounded-circle" alt="">
                                    <small>{{ $post->user->username }}</small>
                                </div>

                            </label>

                            <textarea name="body" id="body" class="form-control" cols="90" rows="10"></textarea>
                            <button type="body" class="btn btn-success form-control mt-2" > SEND </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    @endsection

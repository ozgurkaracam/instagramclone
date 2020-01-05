@extends('layouts/app')
@section('content')
        <div class="container">
            @foreach($users as $user)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <img src="/storage/uploads/{{ $user->profile->profile_image }}" style="max-height: 25px"  class="img-fluid rounded-circle mr-3" alt="">
                            {{ $user->username }}
                            <div class="justify-content-end">
                                <follow-button following="{{ $user }}" follower="{{ $user->id }}" status="{{ \Illuminate\Support\Facades\Auth::user()->following->contains($user) }}"></follow-button>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
        </div>

    @endsection

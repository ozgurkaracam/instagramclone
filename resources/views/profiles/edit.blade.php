@extends('layouts/app')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('profile.update',$profile) }}">
                        {{ @csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row form-group">
                            <div class="col-md-2 text-right">
                                <label for="title" class="text-right">Title</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="title" id="title" value="{{ $profile->title }}" class="form-control">
                                @error('title')
                                <span class="small text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-2 text-right">
                                <label for="description" class="text-right">Description</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="description" id="description" value="{{ $profile->description }}" class="form-control">
                                @error('description')
                                <span class="small text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-2 text-right">
                                <label for="url" class="text-right">Url</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="url" id="url" value="{{ old('url',$profile->url)  }}" class="form-control">
                                @error('url')
                                    <span class="small text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2 text-right">
                                <label for="image" class="text-right">Profile Image</label>
                            </div>
                            <div class="col-md-10">
                                <input type="file" name="image" id="image">
                            </div>
                        </div>
                        <div class="row form-group">
                            <input type="submit" value="Update!" class="btn btn-primary btn-block">
                        </div>


                    </form>
                </div>
            </div>
        </div>

    @endsection

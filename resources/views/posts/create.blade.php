@extends('../layouts/app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h1>Add New Post</h1>
            </div>

        </div>
        <form action="{{ route('p.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">Post Title</label>

                        <div class="col-md-6">
                            <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" autocomplete="title" autofocus>

                            @error('title')
                            <div class="row">
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">Post Caption</label>

                        <div class="col-md-6">
                            <input id="description" name="description" type="text" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" autocomplete="description" autofocus>

                            @error('description')
                            <div class="row">
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8 offset-2">
                <label for="image" class="col-md-4 col-form-label">Post Image</label>
                <input type="file" class="form-control-file"  class="@error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                    <div class="row">
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    </div>

                @enderror
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-8 offset-2">
                <button type="submit" class="btn btn-primary">Add New Post</button>
                </div>
            </div>
        </form>
    </div>
@endsection

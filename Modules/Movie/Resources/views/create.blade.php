@extends('movie::layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Movie') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('movies.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="text" placeholder="Enter Movie Title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add New Movie') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br><br>
            <div class="card">
                <div class="card-header">{{ __('List of Movies') }}</div>

                <div class="card-body">
                    @if (count($movies) == 0)
                        <i>No movies found!</i>
                    @else
                        @foreach ($movies as $movie)
                        {{ $movie->title }} | <a href="{{ route('movies.show', $movie) }}">Add Showtime</a> <hr>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

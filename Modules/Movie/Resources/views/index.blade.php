@extends('movie::layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>{{ __('Movies') }}</h4></div>

                <div class="card-body">
                    @if (count($movies) == 0)
                        <i>No movies found!</i>
                        @auth
                            <a href="{{ route('movies.create') }}" class="btn btn-primary btn-sm"> <b>+</b> Add Movies</a><br><br>
                        @endauth
                    @else
                        @foreach ($movies as $movie)
                        <a href="{{ route('movies.show', $movie) }}">
                            {{ $movie->title }} <hr>
                        </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('movie::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('movie.name') !!}

        @foreach ($movies as $movie)
            {{ $movie->title }}
        @endforeach
    </p>
@endsection

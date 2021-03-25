@extends('movie::layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <a href="{{ route('movies.index') }}" class="btn btn-primary btn-sm"> <b>&lt;</b> back to movies</a><br><br>
            @auth
            <div class="card">
                <div class="card-header">{{ $movie->title }} <h4> Set Showtime</h4></div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('showtimes.store') }}">
                        @csrf
                        <div class="form-group row">
                            {{-- <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label> --}}

                            <input id="text" type="hidden" value="{{ $movie->id }}" placeholder="Enter Movie Title" name="movie_id" autocomplete="title">

                            <div class="col-md-4">
                                <select name="cinema_id" class="form-control @error('cinema_id') is-invalid @enderror" required>
                                    <option value="">Select Cinema</option>
                                    @foreach ($cinemas as $cinema)
                                        <option value="{{ $cinema->id }}" @if(old('cinema_id') == $cinema->id) selected @endif>{{ $cinema->name}}</option>
                                    @endforeach
                                </select>

                                @error('cinema_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input type="datetime-local" placeholder="Select Date" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" autofocus>

                                @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create/Update Showtime') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br><br>
            @endauth
            <div class="card">
                <div class="card-header"><h5>{{ $movie->title }} </h5></div>

                <div class="card-body">
                    @if (count($movie->showtimes) == 0)
                        <i>No Show time for this movie!</i>
                    @else
                        <table class="table table-striped">
                            <tr>
                                <th>S/N</th>
                                <th>Cinema</th>
                                <th>Address</th>
                                <th>Show Time</th>
                            </tr>

                            @php $i = 1; @endphp
                            @foreach ($movie->showtimes as $showtime)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $showtime->cinema->name }}</td>
                                    <td>{{ $showtime->cinema->address }}</td>
                                    <td>{{ date('F d, Y H:i:s', strtotime($showtime->time)) }}</td>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

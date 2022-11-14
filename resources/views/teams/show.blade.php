@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <h3>{{ $team->name }}</h3>
        <div class="row">
            @foreach($team->rosters as $roster)
                <div class="col-md-4">
                    <a  href="/rosters/{{$roster->id}}">
                        <div class="card m-2">
                            <div class="card-body">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <h2>{{ $roster->number }}</h2>
                                            <h3>{{ $roster->pos }}</h3>
                                        </div>
                                        <div class="col-8">
                                            <h4 class="card-title">{{ $roster->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

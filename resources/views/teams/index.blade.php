@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <h3>Teams</h3>
                <ul class="list-group">

                    @foreach($teams as $team)
                        <a href="/teams/{{$team->code}}" class="list-group-item  list-group-item-action">
                            {{ $team->name }}
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

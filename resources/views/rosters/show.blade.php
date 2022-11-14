@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="btn-group float-end">
                        <a href="/export-player?team={{ $roster->team_code }}&player={{ $roster->name }}&format=csv" class="btn btn-sm btn-success" target="_blank">Excel</a>
                        <a href="/export-player?team={{ $roster->team_code }}&player={{ $roster->name }}&format=json" class="btn btn-sm btn-success" target="_blank">Json</a>
                        <a href="/export-player?team={{ $roster->team_code }}&player={{ $roster->name }}&format=xml" class="btn btn-sm btn-success" target="_blank">Xml</a>
                        </div>
                        <img src="..." class="card-img-top rounded mx-auto d-block" alt="...">
                        <h2>{{ $roster->name }}</h2>
                        <h3>{{ $roster->number }}</h3>
                        <h5>{{ $roster->pos}}</h5>

                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="40%"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roster->playerTotals as $playerTotal)
                                    <tr>
                                        <td class="fw-bold">Age</td>
                                        <td>{{ $playerTotal->age }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Games</td>
                                        <td>{{ $playerTotal->games }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Games Started</td>
                                        <td>{{ $playerTotal->games_started }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Minutes Played</td>
                                        <td>{{ $playerTotal->minutes_played }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Field Goals</td>
                                        <td>{{ $playerTotal->field_goals }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Field Goals Attempted</td>
                                        <td>{{ $playerTotal->field_goals_attempted }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">3 Points</td>
                                        <td>{{ $playerTotal['3pt'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">3 Point Attempted</td>
                                        <td>{{ $playerTotal['3pt_attempted']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">2 Points</td>
                                        <td>{{ $playerTotal['2pt'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">2 Point Attempted</td>
                                        <td>{{ $playerTotal['2pt_attempted']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Free Throws</td>
                                        <td>{{ $playerTotal->free_throws}}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Free Throws Attempted</td>
                                        <td>{{ $playerTotal->free_throws_attempted}}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Offensive Rebounds</td>
                                        <td>{{ $playerTotal->offensive_rebounds}}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Defensive Rebounds</td>
                                        <td>{{ $playerTotal->defensive_rebounds}}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Assists</td>
                                        <td>{{ $playerTotal->assists}}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Steals</td>
                                        <td>{{ $playerTotal->steals}}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Blocks</td>
                                        <td>{{ $playerTotal->blocks}}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Turnovers</td>
                                        <td>{{ $playerTotal->turnovers}}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Personal Fouls</td>
                                        <td>{{ $playerTotal->personal_fouls}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

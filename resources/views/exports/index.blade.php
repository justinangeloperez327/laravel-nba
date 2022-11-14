@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-8">
                <h3>Export</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="/export/">
                            <div class="form-group">
                                <label for="">Type</label>
                                <select name="" id="" class="form-control" name="team_code" id="team_code">
                                    <option value="playerstats">Player Stats</option>
                                    <option value="player">Players</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Team</label>
                                <select name="" id="" class="form-control" name="team_code" id="team_code">
                                    <option value="all">All</option>
                                    @foreach($teams as $team)
                                        <option value="{{ $team->code}}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Position</label>
                                <select name="" id="" class="form-control" name="team_code" id="team_code">
                                    <option value="all">All</option>
                                    <option value="C">Center</option>
                                    <option value="PF">Power Forward</option>
                                    <option value="SF">Small Forward</option>
                                    <option value="SG">Shooting Guard</option>
                                    <option value="PG">Point Guard</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Player</label>
                                <select name="" id="" class="form-control" name="player" id="player" disabled>
                                    <div>
                                        <option value="all">All</option>
                                    </div>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Export</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#team_code').on('change', function(e){
            console.log('team_code');
        });
    </script>
@endsection

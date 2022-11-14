<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::query()
            ->orderBy('name')
            ->get();
        return view('teams.index', compact('teams'));
    }

    public function show(Team $team)
    {
        $team->load('rosters.playerTotals');
        return view('teams.show', compact('team'));
    }
}

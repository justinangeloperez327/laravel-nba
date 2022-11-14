<?php

namespace App\Http\Controllers;

use App\Models\Roster;
use App\Models\Team;
use Illuminate\Http\Request;

class RosterController extends Controller
{

    public function show(Roster $roster)
    {
        $roster->load('team', 'playerTotals');

        return view('rosters.show', compact('roster'));
    }

    public function compare(Request $request)
    {
        $roster1 = $this->getRoster($request->roster1);
        $roster2 = $this->getRoster($request->roster2);

        return view('rosters.compare', compact('roster1', 'roster2'));
    }

    private function getRoster(Roster $roster)
    {
        return $roster->load('team', 'playerTotals');
    }

    public function fetchRosters(Request $request)
    {
        $teamCode = $request->team_code;

        return Roster::query()
            ->when($teamCode != 'all', function($query) use ($teamCode){
                $query->where('team_code', $teamCode);
            })
            ->orderBy('name')
            ->get();
    }
}

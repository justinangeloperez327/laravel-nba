<?php

namespace App\Http\Controllers;

use App\Exports\RostersExport;
use App\Models\Roster;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
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

    public function export(Request $request)
    {
        $rosters = Roster::query()
        ->when($request->has('position'), function($query) use ($request){
            $query->where('pos', $request->position);
        })
        ->when($request->has('team'), function($query)  use ($request){
            $query->where('team_code', $request->team);
        })
        ->when($request->has('player'), function($query)  use ($request){
            $query->where('name', 'LIKE', '%'.$request->player.'%');
        })
        ->get();

        if($request->format === 'xml')
        {
            return response()->view('exports.xml-rosters', compact('rosters'))->header('Content-Type', 'text/xml');
        }

        return Excel::download(new RostersExport($rosters->toArray()), 'nba.csv');
    }

    public function exportPlayer(Roster $roster, Request $request)
    {
        $rosters = Roster::query()
        ->when($request->has('position'), function($query) use ($request){
            $query->where('pos', $request->position);
        })
        ->when($request->has('team'), function($query)  use ($request){
            $query->where('team_code', $request->team);
        })
        ->when($request->has('player'), function($query)  use ($request){
            $query->where('name', 'LIKE', '%'.$request->player.'%');
        })
        ->get();

        if($request->has('format'))
        {

            if($request->format === 'json'){
                $jsonData = json_encode($rosters);
                $fileName = 'nba.json';
                File::put(public_path('/upload/json/'.$fileName), $jsonData);
                return Response::download(public_path('/upload/json/'.$fileName));
            }

            if($request->format === 'xml'){
                return response()->view('exports.xml-rosters', compact('rosters'))->header('Content-Type', 'text/xml');
            }

            if($request->format === 'csv')
            {
                return Excel::download(new RostersExport($rosters->toArray()), 'nba.csv');
            }
        }
    }
}

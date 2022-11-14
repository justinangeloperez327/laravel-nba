<?php

namespace App\Http\Controllers;

use App\Models\Roster;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('name')->get();

        return view('exports.index', compact('teams'));
    }

    public function export(Request $request)
    {

        $data = $this->exportData($request);

        if ($request->format == 'xml'){
            $this->exportToXml($data);
        }
        if ($request->format == 'xml') {
            $this->exportToXml($data);
        }
    }

    private function exportData($request)
    {
        $teamCode = $request->team_code;
        $position = $request->position;
        $playerName = $request->player_name;

        return DB::table('roster as r')->join('team as t', 't.code', 'r.team_code')
            ->join('player_totals as p', 'p.player_id', 'r.id')
            ->when($teamCode != 'all', function($query) use ($teamCode){
                $query->where('t.code', $teamCode);
            })
            ->when($position != 'all', function($query) use ($position){
                $query->where('r.pos', $position);
            })
            ->when($playerName != 'all', function($query) use ($playerName){
                $query->where('roster.name', 'LIKE', '%'.$playerName.'%');
            })
            ->get();
    }


    private function exportToXml($data)
    {

    }

    private function exportToJson($data)
    {

    }
}

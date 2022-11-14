<?php

namespace App\Exports;

use App\Models\Roster;
use Maatwebsite\Excel\Concerns\FromArray;

class RostersExport implements FromArray
{

    protected $rosters;

    public function __construct(array $rosters)
    {
        $this->rosters = $rosters;
    }

    public function array(): array
    {
        return $this->rosters;
    }
}

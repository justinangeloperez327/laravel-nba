<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    use HasFactory;

    protected $table = 'roster';

    public  $incrementing = false;
    protected $keyType = 'string';

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_code', 'code');
    }

    public function playerTotals()
    {
        return $this->hasMany(PlayerTotal::class, 'player_id', 'id');
    }
}

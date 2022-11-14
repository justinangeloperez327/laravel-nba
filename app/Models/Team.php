<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';
    protected $primaryKey = 'code';
    public  $incrementing = false;
    protected $keyType = 'string';

    public function rosters()
    {
        return $this->hasMany(Roster::class, 'team_code', 'code')->orderBy('name');
    }
}

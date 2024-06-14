<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $fillable = ['id', 'name', 'start_date', 'end_date', 'quantity'];

    public function equipos()
    {
        return $this->hasMany(Team::class, 'league_id');
    }
}

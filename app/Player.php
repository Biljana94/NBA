<?php

namespace App;

use App\Team;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded = ['id'];

    //u ovoj metodi smo dodelili svakom igracu tim za koji on igra
    public function team()
    {
        return $this->belongsTo(Team::class); //preko team_id se uzima tim za koji igrac igra; vracamo kojem timu pripada koji igrac
    }
}

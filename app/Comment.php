<?php

namespace App;

use App\Team;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id', 'team_id']; //sta sve menjamo u bazi podataka

    //validaciona pravila za komentare
    const VALIDATION_RULES = [
        'content' => 'required|min:10'
    ];

    //relacija za komentare i timove (jedan komentar moze da pripada jednom timu)
    public function team()
    {
        return $this->belongsTo(Team::class); //komentar pripada nekom timu
    }

    //autor komentara
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use App\Player;
use App\News;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = ['id'];

    public function players()
    {
        return $this->hasMany(Player::class); //uzimamo sve igrace tog tima
    }

    //tim ima vise komentara - relacija
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //tim ima vise vesti - relacija
    public function news()
    {
        return $this->belongsToMany(News::class);
    }

    //uzimamo ime tima
    public function getRouteKeyName() {
        return 'name';
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Team;
use App\User;

class News extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];

    //jedna vest ima jednog usera - relacija
    public function user()
    {
        return $this->belongsTo(Team::class);
        // $this->belongsTo('App\Team', 'team_id');
    }

    //relacije
    //jedna vest pripada samo 1 timu (a imamo vise timova i vise vesti)
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}

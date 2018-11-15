<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use App\Team;
use App\User;

class News extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];

    //relacije
    //jedna vest pripada samo 1 timu
    // public function team()
    // {
    //     $this->belongsTo(Team::class);
    // }

    //jedna vest ima jednog usera - relacija
    public function user()
    {
        return $this->belongsTo(User::class);
        // $this->belongsTo('App\User', 'user_id');
    }
}

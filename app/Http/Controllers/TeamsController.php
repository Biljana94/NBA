<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    //middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    //view za sve timove
    public function index()
    {
        $teams = Team::all(); //ovde stavljamo sve timove u varijablu $teams
        return view('teams.index', ['teams' => $teams]); //vracamo view iz foldera teams i fajla index.blade.php , i vracamo niz timova
    }

    //view za svaki tim posebno
    public function show($id)
    {

        $team = Team::findOrFail($id); //smestamo u ovu varijablu tim po $id
        return view('teams.show', ['team' => $team]); //i vracamo svaki tim posebno
    }

    //tim ima vise komentara - relacija
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

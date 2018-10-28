<?php

namespace App\Http\Controllers;

use App\Player; //koristimo Player.php model jer su u njemu podaci iz baze
use Illuminate\Http\Request;

class PlayersController extends Controller
{

    public function index()
    {
        $players = Player::all();

        return view('player.index', ['players' => $players]);
    }

    public function show($id)
    {
        $player = Player::findOrFail($id); //svakog igraca trazimo po $id i smestamo u varijablu $player
        return view('players.show', ['player' => $player]); //vracamo prikaz na stranici; iz foldera players - show.blade.php
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
use App\User;
use App\Team;

class NewsController extends Controller
{
    //middleware - samo ulogovan korisnik moze da vidi vesti
    public function __construct()
    {
        $this->middleware('auth');
    }

    //view za sve vesti
    public function index()
    {
        $allNews = News::with('user')->paginate(10); //u $allNews stavljamo sve vesti;  EAGER LOADING -> with('user'); PAGINACIJA -> paginate(10) - 10 postova po stranici
        return view('news.index', ['allNews' => $allNews]);
    }

    //view za svaku vest posebno
    public function show($id)
    {
        $news = News::findOrFail($id); //ovde smestamo vest po 'id' u promenljivu $news;
        // dd($news);
        return view('news.show', ['news' => $news]); //vracamo view
    }

    //
    public function newsTeam(Team $team) {
        // $team = Team::where('name', $team);
        $allNews = $team->news()->with('teams')->paginate(2);
        return view('news.index', ['allNews' => $allNews]);
    }
}

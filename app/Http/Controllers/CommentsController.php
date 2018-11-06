<?php

namespace App\Http\Controllers;

use App\Team;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    //samo ulogovani mogu da postavljaju komentar
    public function __construct()
    {
        $this->middleware('auth');
    }

    //unosimo komentar u bazu podataka za odredjeni tim
    public function store($team_id)
    {
        // $team = Team::findOrFail($team_id);

        $this->validate(
            request(),
            Comment::VALIDATION_RULES
        );

        // $team->comments()->create(
        //     request()->all()
        // );

        $comment = new Comment(); //instanciramo Comment.php model
        $comment->user_id = auth()->user()->id; //u komentare dodeljujemo user_id-u autentifikovanog usera sa njegovim licnim id
        $comment->team_id = $team_id; //u komentar dodeljujemo na team_id id tog tima koji smo definisali gore
        $comment->content = request('content'); //kad upisemo kontent u komentar saljemo request sa tim kontentom da ga ubacimo u bazu
        $comment->save(); // cuvamo komentar u bazi

        return redirect("/teams/{$team_id}");
    }

    //brisanje komentara
    // public function destroy($team_id, $comment_id)
    // {
    //     $comment = Comment::findOrFail($comment_id);
    //     $comment->delete();

    //     return redirect("/teams/{$team_id}");
    // }
}

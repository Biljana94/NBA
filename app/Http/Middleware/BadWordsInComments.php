<?php

namespace App\Http\Middleware;

use Closure;

// use App\Comment;

class BadWordsInComments
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    //ovaj middleware se poziva nad '/teams/{team_id}/comments' rutom
    public function handle($request, Closure $next)
    {
        //presrecemo lose reci pre nego sto se komentar unese u bazu
        $badWords = ['stupid', 'idiot', 'hate'];

        foreach($badWords as $badWord)
        {
            if(preg_match("/\b$badWord\b/i", $request)) //preg_match("/\b nesto \b/i", $request) - prvi parametar je $badWord, trazimo tu rec u $request(u upitu korisnika koji salje komentar i u tom stringu trazimo tu identicnu rec(zbog ovog 'i' je case sensitive i prepoznaje i velika slova), sto je drugi parametar)
            {
                return response(view('comments.forbidden-comment')); //ako je rec nadjena u komentaru vrati forbidden-comment.blade.php
            }

        }

        return $next($request); //ako nije pronadjena onda pusti korisnika da ostavi komentar
    }
}

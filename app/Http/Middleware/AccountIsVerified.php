<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AccountIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $user = User::where('email', $request->email)->first(); //trazimo usera preko njegovog emaila
        //dd($user);
        if(!$user->is_verified) //ako user nije verifikovan
        {
            session()->flash('warning', 'Vas nalog nije verifikovan!'); //izbaci mu warning
            return back();
        }

        return $next($request); //ako je verifikovan pusti ga dalje
    }
}

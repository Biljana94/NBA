<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    
    public function __construct()
    {
        //middleware koji zabranjuje gostu stranice da nista ne vidi sem logina i registracije
        $this->middleware('guest', ['except' => 'logout']); //gostu je zabranjeno da se izloguje (i vidi stranice timova i igraca)
    }

    //view za login rutu, kad korisnik hoce da se uloguje
    public function index()
    {
        return view('login.index');
    }

    //funkcija za login korisnika
    public function login()
    {

        //dd(request());

        if(!auth()->attempt(request(['email', 'password']))) //ako nema unetih polja ili su pogresno upisana (email, password)
        {
            $user = User::where('email',  request('email'))->first(); //User koji salje request() sa mailom, da se prvo mail proverava da li je u bazi

            if (!isset($user)) { //ako user sa tim emailom nije u bazi
                return back()->withErrors(['warning' => 'Email is not verified! You must register first.']);//izbaci gresku sa porukom
                }
            
            return back()->withErrors(['warning' => 'Pogresio si sifru!']); //vrati ovu poruku
        }

        return redirect('/'); //u suprotnom uloguj usera i redirektuj na stranicu gde su svi timovi
    }

    //funkcija za logout korisnika
    public function logout()
    {
        auth()->logout();
        return redirect('/login'); //LOGIN FOLDER I INDEX.BLADE.PHP U VIEWS FOLDERU
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //view za login rutu, kad korisnik hoce da se uloguje
    public function index()
    {
        return view('login.index');
    }

    //funkcija za login korisnika
    public function login()
    {
        if(!auth()->attempt(request(['email', 'password']))) //ako nema unetih polja ili su pogresno upisana (email, password)
        {
            return back()->withErrors(['message' => 'Pogresio si sifru!']); //vrati ovu poruku
        }

        return redirect('/'); //u suprotnom uloguj usera i redirektuj na stranicu gde su svi timovi
    }

    //funkcija za logout korisnika
    public function logout()
    {
        auth()->logout();
        return redirect('/login'); //NAPRAVITI LOGIN FOLDER I INDEX.BLADE.PHP U VIEWS FOLDERU
    }
}

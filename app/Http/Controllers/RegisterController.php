<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function __construct()
    {
        //middleware
        $this->middleware('guest'); //gostu koji je ulogovan je zabranjeno da se uloguje i registruje
    }

    //kreiramo novog korisnika
    public function create()
    {
        return view('register.create');
    }

    //cuvamo novog korisnika i koristimo validaciona pravila koja smo definisali u User.php modelu
    public function store()
    {
        $this->validate(
            request(),
            User::VALIDATION_RULES
        );

        $user = new User(); //instanca modela User
        $user->name = request('name');//ime usera
        $user->email = request('email'); //email usera
        $user->password = bcrypt(request('password')); //enkriptovan password usera(sifrovan password)
        $user->save(); //MORAMO OVO PROSLEDITI, ovo nam cuva usera u bazi podataka

        auth()->login($user);

        session()->flash('message', 'Hvala sto ste se registrovali!');

        return redirect('/');
    }
}

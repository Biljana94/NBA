<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail; //fasada za Mail verifikacioni
use App\Mail\VerificationMail; //nasa Mail klasa koju smo pravili

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
        $user->is_verified = false; //PO DEFAULTU USER NIJE VERIFIKOVAN
        $user->verification_code = str_random(40); //kad se korisnik verifikuje dodeljujemo mu neki kod koji ce biti jedinstven za svakog usera
        $user->save(); //MORAMO OVO PROSLEDITI, ovo nam cuva usera u bazi podataka

        // auth()->login($user);

        // zovemo Mail fasadu, to() funkcija kome saljemo email, poslace email useru koji se registrovao
        Mail::to($user->email)->send(new VerificationMail($user));//u send() salje sablon tj VerificationMail klasu i prosledjujemo $user jer njemu saljemo mail a imamo ga u VerificationMail.php

        session()->flash('message', 'Hvala sto ste se registrovali! Poslali smo Vam email za verifikaciju naloga!');

        return redirect('/login');
    }

    //verifikovanje korisnika pri registraciji
    public function verify(String $verification_code)
    {
        //dd(request());
        $user = User::where('verification_code', $verification_code)->first(); //trazimo usera preko User.php modela gde mu je verifikacioni kod jedinstven
        $user->is_verified = true; //kolonu is_verified menjamo u true, to znaci da se verifikovao
        $user->verification_code = null; //i postavljamo verifikacioni kod opet na nulu
        $user->save(); //SACUVATI USERA OBAVEZNO!!!!!!!!!!!!

        session()->flash('message', 'Nalog je verifikovan! Dobrodosli!'); //ispisujemo poruku da je nalog verifikovan

        return redirect('/login'); //i redirektujemo ga na /login stranicu

    }
}

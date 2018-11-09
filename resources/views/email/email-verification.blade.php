<p>Kliknete na ovaj link: 

    {{-- ako kao rutu u href napisemo href="/verify/.." on ce nam tu rutu samo nakaciti na mail usera koji se verifikuje i izaci ce greska.
        zato moramo da pisemo celu rutu href="http://localhost:8000/verify/.." da bi nas vratio na nas sajt --}}

    <a href="http://localhost:8000/verify/{{ $user->verification_code }}">
        http://localhost:8000/verify/{verification_code}
    </a>

</p>

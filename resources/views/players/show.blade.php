
@extends('layouts.master')

@section('title')
    Player
@endsection


@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">Player</h2>

        <ul>
            <li>
                First Name: {{ $player->first_name }}
            </li>
            <li>
                Last Name: {{ $player->last_name }}
            </li>
            <li>
                Email: {{ $player->email }}
            </li>


            <li>
                Team: <a href="{{ route('teams.show',[ 'id' => $player->team->id]) }}"> {{ $player->team->name }} </a>
            </li> <!--ime tima za koji igrac igra-->

            
        </ul>
    </div>
@endsection

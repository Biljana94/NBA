
@extends('layouts.master')

@section('title')
    Team
@endsection


@section('content')
    
    <div class="blog-post">
        <h3 class="blog-post-title">{{ $team->name }}</h3>
        
        <ul>
            <li>Email: 
                {{ $team->email }}
            </li>

            <li>Address: 
                {{ $team->address }}
            </li>

            <li>City: 
                {{ $team->city }}
            </li>

            @foreach ($team->players as $player)
                <li>Player: 
                    <a href="/players/{{ $player->id }}">
                        {{ $player->first_name }}
                        {{ $player->last_name }}
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
    
@endsection


@extends('layouts.master')

@section('title')
    Team
@endsection


@section('content')

    {{-- <a class="" href="/teams/{{ $team-id }}/news">All Teams</a>
    <a>Team News</a> --}}
    
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
    


        <!-- komentari koji su prikazani za svaki tim posebno -->
        @if(count([$team->comments])) <!--ako ima komentara-->
                <h4>Comments: </h4>
                <ul class="list-unstyled">
                    @foreach($team->comments as $comment)
                        <li>
                            <p><strong>Author: </strong>{{ $comment->user->name }}</p> <!--ispisi autora komentara-->
                            <p>{{ $comment->content }}</p> <!--ispisi text komentara-->
                        </li>
                    @endforeach

                    

                </ul>
        @endif






        <!--forma za unos komentara-->
        <h4>Post a Comment</h4>
        <form method="POST" action="/teams/{{ $team->id }}/comments">

            {{ csrf_field() }}

            {{-- <div class="form-group">
                <label>Author</label>
                <!--u name:author validiramo ono iz baze, tj polje iz baze podataka-->
                <input name="" type="text" class="form-control" placeholder="Enter author">
                @include('layouts.partials.error-message', ['field' => 'user']) <!--definisali smo $field za error-->
            </div> --}}

            <div class="form-group">
                <label>Text</label>
                <textarea name="content" type="text" class="form-control" placeholder="Enter content"></textarea>
                @include('layouts.partials.error-message', ['field' => 'content']) <!--ovde smo definisali $field za error-->
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div> <!-- div.blog-post -->

@endsection

@extends('layouts.master')

@section('title')
    Teams
@endsection

@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">Teams</h2>

        <ul>
            
            @foreach ($teams as $team)
                <li>
                    <a href="/teams/{{ $team->id }}">
                        {{ $team->name }}
                    </a>
                </li>
            @endforeach
            
        </ul>
    </div>
@endsection

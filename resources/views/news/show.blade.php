@extends('layouts.master')

@section('title')
    News
@endsection


@section('content')
    <div class="blog-post">

        <h3 class="blog-post-title"> {{ $news->title }} </h3>

        <ul>
            <li> {{ $news->content }} </li>
            <li>Author: {{ $news->user->name }} </li>
        </ul> 

        <ul>
            @foreach ($news->teams as $team)
                <a href="/news/team/{{$team->name}}">{{$team->name}}</a>
            @endforeach
        </ul>
        
    </div>
@endsection

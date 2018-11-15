@extends('layouts.master')

@section('title')
    All News
@endsection


@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">All News</h2>

        <ul>
            @foreach ($allNews as $news)
                <li>
                    <a href="/news/{{ $news->id }}"> <!--link za svaku vest posebno-->
                        {{ $news->title }}
                    </a>
                </li>

                <li>Author: {{ $news->user->name }} </li> <!--ime usera koji je napisao vest-->
            @endforeach
        </ul>
    </div>

    {{-- paginacija stranice --}}
    <nav class="blog-pagination">
        <a class="btn btn-outline-{{ $allNews->currentPage() == 1 ? 'secondary disabled' : 'primary' }}" href="{{ $allNews->previousPageUrl() }}">Older</a>
        <a class="btn btn-outline-{{ $allNews->hasMorePages() ? 'primary' : 'secondary disabled' }}" href="{{ $allNews->nextPageUrl() }}">Newer</a>
        {{-- Page {{ $allNews->currentPage() }} of {{ $allNews->lastPage() }} --}}
    </nav>

    {{ $allNews->links() }}
@endsection

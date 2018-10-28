
<h3>{{ $team->name }}</h3>

<div>
    <ul>
        <li>
            {{ $team->email }}
        </li>

        <li>
            {{ $team->address }}
        </li>

        <li>
            {{ $team->city }}
        </li>

        @foreach ($team->players as $player)
            <li>
                <a href="/players/{{ $player->id }}">
                    {{ $player->first_name }}
                    {{ $player->last_name }}
                </a>
            </li>
        @endforeach

    </ul>
</div>

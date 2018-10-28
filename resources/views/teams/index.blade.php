<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>NBA Teams</title>
</head>
<body>
    <ul>
        
        @foreach ($teams as $team)
            <li>
                <a href="/teams/{{ $team->id }}">
                    {{ $team->name }}
                </a>
            </li>
        @endforeach
        
    </ul>
</body>
</html>

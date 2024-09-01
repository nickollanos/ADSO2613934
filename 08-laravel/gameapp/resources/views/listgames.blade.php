{{-- @extends('layouts.app')
@section('title', 'GameApp - List All Games')
@section('class', 'module-user')

@section('content') --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List All Games</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1>List All Games</h1>
    <div class="overflow-x-auto">
    <table class="table table-zebra">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Developer</th>
                <th>Release Date</th>
                <th>Category</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)
                <tr>
                    <td>{{ $game->id }}</td>
                    <td>{{ $game->title }}</td>
                    <td>{{ $game->developer }}</td>
                    <td>{{ $game->releasedate }}</td>
                    <td>{{ $game->category->name }}</td>
                    <td>{{ $game->user->fullname }}</td>
                    <td>{{ $game->user->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>
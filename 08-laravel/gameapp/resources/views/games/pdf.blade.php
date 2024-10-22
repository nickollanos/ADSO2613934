<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALL Users</title>
</head>
<body>
    <table>
        <tr>
            <th>TITLE</th>
            <th>DEVELOPER</th>
            <th>RELEASEDATE</th>
            <th>PRICE</th>
            <th>GENRE</th>
            <th>IMAGEN</th>
        </tr>
        @foreach($games as $game)
        <tr>
            <td> {{ $game->title }} </td>
            <td> {{ $game->developer }}  </td>
            <td> {{ $game->releasedate }} </td>
            <td> {{ $game->price }} </td>
            <td> {{ $game->genre }} </td>
            <td> <img src="{{ public_path().'/images/'.$game->image }}" width="48px"></td>
        </tr>
        @endforeach
    </table>
</body>
</html>
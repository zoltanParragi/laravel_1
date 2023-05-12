<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>

<body>
    <h1>Users</h1>
    <form action="" method="get">
        {{-- A use Illuminate\Suppport\Facedes\Request automatikusan betöltődik a blade-be. Statikus Request változat. --}}
        <input type="text" name="q" value={{ Request::get('q') }}>
        <button type="submit">Küld</button>
    </form>
    {{-- {{ var_dump($user_list) }} --}}

    <table border=1 cellpadding=5>
        @foreach ($user_list as $user)
            <tr>
                {{-- <td>{{ $user->id }}</td> --}}
                <td>{{ $user->name }}</td>
                {{-- <td>{{ $user->email }}</td> --}}
                <td>{{ $user->user_email }}</td>
            </tr>
        @endforeach
    </table>

    {{-- <p>{{ $user_list }}</p> --}}

</body>

</html>

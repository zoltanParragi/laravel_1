<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add users</title>
</head>

<body>
    <h1>Add users to the database (users2)</h1>
    @if (Session::has('successmessage'))
        <div>{{ Session::get('successmessage') }}</div>
    @endif
    <form action="" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="name" value={{ old('name') }}>
        @error('name')
            <div>{{ $message }}</div>
        @enderror
        <br><br>
        <input type="email" name="email" id="email" placeholder="email" value={{ old('email') }}>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
        <br><br>
        <input type="password" name="password" id="password" placeholder="password">
        @error('password')
            <div>{{ $message }}</div>
        @enderror
        <br><br>
        <input type="password" name="password_confirmation" id="password_confirmation"
            placeholder="password confirmation">
        <br><br>
        <button type="submit">Küld</button>
    </form>

    <h2>Users</h2>
    @foreach ($user_list as $user)
        <p>Name: {{ $user->name }}, email: {{ $user->email }},
            @if ($user->posts_json)
                post titles:
                @foreach ($user->posts_json as $post)
                    <span>{{ $post->name }}, </span>
                @endforeach
            @endif
        </p>
    @endforeach

</body>

</html>
